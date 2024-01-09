<?php

namespace Dhruvang\GenerateRules\App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;
use PDO;
use PhpParser\Error;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\Closure;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Expression;
use PhpParser\Node\Stmt\Return_;
use PhpParser\ParserFactory;

class RuleGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:ruleFromMigration {migration?} {--caller= : The calling command}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to generate rules from migration file name';

    /**
     * The table name.
     *
     * @var string
     */
    protected string $tableName;
    /**
     * @var array
     */
    private array $validations;
    /**
     * @var array
     */
    private array $allValidations = [];
    /**
     * @var string
     */
    private string $database;
    const MYSQL = 'mysql';
    const PGSQL = 'pgsql';

    /**
     * Execute the console command.
     * @throws Exception
     */
    public function handle(): void
    {
        try {
            $pdo = DB::connection()->getPdo();
            $this->database = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
            echo "Connected successfully to database: " . DB::connection()->getDatabaseName() . PHP_EOL;
        } catch (Exception $e) {
            $this->alert("Could not connect to the database. Please check your configuration. error:" . $e->getMessage());
            return;
        }
        $caller = $this->option('caller');
        $migration = $this->argument('migration');
        if (!$migration) {
            $migration = $this->ask('Please provide the migration file name?', 'E.g. 2014_10_12_000000_create_users_table');
        }
        try {
            $migrationFilePath = database_path('migrations\\' . $migration . '.php');
            $migrationCode = file_get_contents($migrationFilePath);

            $stmts = $this->parseMigrationCode($migrationCode);
            $this->processStatements($stmts);

            $paths = [];
            foreach ($this->allValidations as $name => $validation) {
                $paths[] = $this->createRequestFile($name, $validation);
            }

            if ($caller) {
                $this->info(json_encode($paths));
            } else {
                foreach ($paths as $path) {
                    self::infoMessage("Request file created at [{$path}] successfully.");
                }
            }

        } catch (Exception $exception) {
            $this->error($exception->getMessage());
        }

    }

    /**
     * Outputs an info message with green text color.
     *
     * This method uses ANSI escape codes to set the text color to green for the "INFO" prefix,
     * and then resets the color back to default for the actual message.
     *
     * @param string $message The message to be displayed.
     * @return void
     */
    public static function infoMessage(string $message): void
    {
        // ANSI escape code for green text
        $green = "\033[34m";

        // ANSI escape code for no color (reset)
        $reset = "\033[0m";

        echo "{$green}INFO  {$reset}{$message}" . PHP_EOL;
    }

    /**
     * Creates a new request file with validation rules.
     *
     * This method generates a Laravel request class file based on a provided stub.
     * It replaces certain placeholders in the stub with actual values like the namespace, class name,
     * and validation rules, and saves it in the appropriate directory.
     *
     * @param string $name Name of the request class, used to construct the class name.
     * @param array $validationRules Array of validation rules to be included in the request.
     * @return string The path to the newly created request file.
     */
    protected function createRequestFile(string $name, array $validationRules): string
    {
        $className = ucfirst(Str::camel($name)) . 'Request';
        $requestsDirectory = app_path('Http/Requests');

        if (!file_exists($requestsDirectory)) {
            mkdir($requestsDirectory, 0755, true); // Create the directory if it doesn't exist
        }

        $packageBasePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';
        $stubPath = $packageBasePath . '/stubs/customizedRequest.stub';
        $content = file_get_contents($stubPath);

        // Replace placeholders in the stub file with actual values
        $content = str_replace('{{ namespace }}', 'App\Http\Requests', $content);
        $content = str_replace('{{ class }}', $className, $content);
        $content = str_replace('{{ rules }}', $this->formatValidationRules($validationRules), $content);

        $path = $requestsDirectory . "/{$className}.php";

        // Write the modified content to the new file
        file_put_contents($path, $content);

        return $path;
    }

    /**
     * Formats the validation rules into a string for use in a request file.
     *
     * This method takes an associative array where each key is a form field and
     * the corresponding value is an array of validation rules for that field.
     * It formats this array into a string representation suitable for embedding
     * in the generated request class file.
     *
     * @param array $rules An associative array of field names and their validation rules.
     * @return string A string representation of the validation rules, formatted for PHP syntax.
     */
    protected function formatValidationRules(array $rules): string
    {
        $result = [];
        foreach ($rules as $field => $validations) {
            $formattedValidations = implode("', '", $validations);
            $result[] = "'$field' => ['$formattedValidations']";
        }

        return implode("," . PHP_EOL . "            ", $result);
    }

    /**
     * Parses PHP migration code into an abstract syntax tree (AST).
     *
     * This method uses PHP-Parser to convert the provided PHP migration code
     * into an AST. This AST can then be traversed and analyzed to extract
     * information such as schema definitions or method calls within the migration.
     *
     * @param string $migrationCode The PHP code of the migration file.
     * @return array|null An array representing the AST of the parsed code, or null if an error occurs.
     */
    protected function parseMigrationCode(string $migrationCode): ?array
    {
        $parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        try {
            return $parser->parse($migrationCode);
        } catch (Error $e) {
            // Handle the error appropriately
            $this->error('Error parsing migration code: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Filters statements to return only those that are 'return new' expressions.
     *
     * @param array $stmts Array of statements to filter.
     * @return array An array of filtered statements.
     */
    protected function filterReturnStatements(array $stmts): array
    {
        return array_filter($stmts, function ($stmt) {
            return $stmt instanceof Return_ &&
                $stmt->expr instanceof New_;
        });
    }

    /**
     * Extracts the anonymous class from a return statement, if available.
     *
     * @param Return_ $returnStatement The return statement node.
     * @return Name|null The class name node if an anonymous class is returned, null otherwise.
     */
    protected function getAnonymousClassFromReturnStatement(Return_ $returnStatement): ?Class_
    {
        return $returnStatement->expr instanceof New_ && $returnStatement->expr->class instanceof Class_
            ? $returnStatement->expr->class
            : null;
    }

    /**
     * Processes an array of statements to find and handle anonymous classes in return statements.
     *
     * @param Node[] $stmts Array of PHP Parser Nodes.
     * @return void
     * @throws Exception
     */
    protected function processStatements(array $stmts): void
    {
        $returnStatements = $this->filterReturnStatements($stmts);

        // Check for anonymous classes in return statements
        foreach ($returnStatements as $returnStatement) {
            $anonymousClass = $this->getAnonymousClassFromReturnStatement($returnStatement);

            if ($anonymousClass instanceof Class_) {
                $this->processUpMethod($anonymousClass);
                return; // Process only the first found anonymous class
            }
        }

        // If no anonymous class is found in return statements, check for Class_ nodes
        $classNodes = array_filter($stmts, function ($stmt) {
            return $stmt instanceof Class_;
        });

        if (!empty($classNodes)) {
            // Process the first found Class_ node
            $firstClassNode = reset($classNodes);
            $this->processUpMethod($firstClassNode);
        } else {
            echo 'No anonymous class or class node found.' . PHP_EOL;
        }
    }


    /**
     * @throws Exception
     */
    protected function processUpMethod($anonymousClass)
    {
        $upMethods = array_filter($anonymousClass->stmts, function ($stmt) {
            return $stmt instanceof ClassMethod && $stmt->name->name === 'up';
        });

        if (!empty($upMethods)) {
            $firstUpMethod = reset($upMethods);
            $this->processUpMethodStatements($firstUpMethod);
        } else {
            throw new Exception('There should be at least one up method');
        }
    }

    /**
     * Processes the statements within the 'up' method of a migration class.
     *
     * @param ClassMethod $upMethod The 'up' method node.
     * @return void
     */
    protected function processUpMethodStatements(ClassMethod $upMethod): void
    {
        $upMethodStmts = $upMethod->getStmts();

        // Check if there are any statements in the 'up' method
        if (count($upMethodStmts) === 0) {
            echo 'No statements found in the up method.' . PHP_EOL;
            return;
        }

        // Process each statement in the 'up' method
        foreach ($upMethodStmts as $upMethodStmt) {
            $this->processUpMethodStatement($upMethodStmt);
        }
    }

    /**
     * Processes a single statement from the 'up' method of a migration.
     *
     * @param Node $upMethodStmt The statement node to process.
     * @return void
     */
    protected function processUpMethodStatement(Node $upMethodStmt): void
    {
        // Check if the statement is an Expression
        if ($upMethodStmt instanceof Expression) {
            // Process the expression part of the statement
            $this->processExpression($upMethodStmt->expr);
        }
    }

    /**
     * Processes an expression node.
     *
     * @param Expr $expr The expression node to process.
     * @return void
     */
    protected function processExpression(Expr $expr): void
    {
        if ($expr instanceof StaticCall && $expr->class instanceof Name && $expr->class->getFirst() === class_basename(Schema::class)) {
            if ($expr->name instanceof Identifier) {
                switch ($expr->name) {
                    case 'create' :
                    case 'table' :
                        $this->processSchemaMethod($expr);
                        break;
                    default :
                        return;
                }
            }
        }
    }

    /**
     * Processes a Schema method call.
     *
     * @param StaticCall $expr The static call expression to process.
     * @return void
     * @throws InvalidArgumentException If invalid arguments are provided to the Schema call.
     */
    protected function processSchemaMethod(StaticCall $expr): void
    {
        $args = $expr->getArgs();

        if (count($args) > 0) {
            // Check if the first argument is a string (for table name)
            if ($args[0]->value instanceof String_ && $args[0]->value->value !== null) {
                $tableName = $args[0]->value->value;
                $this->assignTableName($tableName);
            } else {
                throw new InvalidArgumentException("Invalid argument provided to Schema for table name.");
            }

            // Check if the second argument is a closure (for defining table schema)
            if (isset($args[1]) && $args[1]->value instanceof Closure) {
                $this->processClosure($args[1]->value);
            } else {
                throw new InvalidArgumentException("Invalid argument provided to Schema for closure.");
            }
        }
    }

    /**
     * Assigns a table name to the class property.
     *
     * @param string $tableName The name of the table.
     */
    protected function assignTableName(string $tableName): void
    {
        $this->tableName = $tableName;
        // Uncomment the below line if you want to debug or log the table name.
        // dump('Table Name: ' . $tableName . ' ' . $this->tableName);
    }

    /**
     * Processes a closure typically found in Laravel schema definitions.
     *
     * @param Closure $closure The closure to process.
     * @throws InvalidArgumentException Thrown if an invalid argument is provided.
     */
    protected function processClosure(Closure $closure): void
    {
        $variableName = '';
        foreach ($closure->getParams() as $param) {
            if ($param instanceof Param && $param->type instanceof Name && $param->type->getParts()[0] === class_basename(Blueprint::class)) {
                $variableName = $param->var->name;
            }
        }

        if (is_null($variableName)) {
            throw new InvalidArgumentException("Invalid argument provided to Schema");
        }

        if ($this->database === self::MYSQL) {
            foreach ($closure->getStmts() as $statement) {
                $this->validations[] = $this->processClosureStatement($statement);
            }
        }

        $consolidatedValidations = $this->consolidateValidations($this->validations);
        $this->allValidations[$this->tableName] = $consolidatedValidations;
    }

    /**
     * Consolidates validation rules from an array of validation arrays.
     *
     * @param array $validationsArray The array of validation rule arrays.
     * @return array Consolidated validation rules.
     */
    protected function consolidateValidations(array $validationsArray): array
    {
        $consolidated = [];

        foreach ($validationsArray as $entry) {
            foreach ($entry as $field => $rules) {
                if (!array_key_exists($field, $consolidated)) {
                    $consolidated[$field] = is_array($rules) ? array_unique($rules) : [$rules];
                } else {
                    $consolidated[$field] = array_unique(array_merge($consolidated[$field], is_array($rules) ? array_unique($rules) : [$rules]));
                }
            }
        }

        // Remove any fields that have empty rules
        foreach ($consolidated as $field => $rules) {
            if (empty($rules)) {
                unset($consolidated[$field]);
            }
        }

        return $consolidated;
    }

    /**
     * Processes a closure statement and returns validation rules.
     *
     * @param Node $statement The AST node representing the statement.
     * @return array The extracted validation rules.
     */
    protected function processClosureStatement(Node $statement): array
    {
        $validation = [];
        $expr = $statement->expr;
        $methodCallDetails = $this->extractMethodCallDetails($expr);

        if (count($methodCallDetails) > 0) {
            $reversedMethodCallDetails = array_reverse($methodCallDetails);
            $firstArg = $reversedMethodCallDetails[0]['args'][0] ?? null;

            $fieldName = null;
            if ($firstArg instanceof String_) {
                $fieldName = $firstArg->value;
            } elseif ($firstArg instanceof ClassConstFetch) {
                $fieldName = $firstArg->name->name;
            }

            $validations = [];
            $tableName = '';

            foreach ($reversedMethodCallDetails as $detail) {
                $newRules = $this->getRuleForFieldWithName($reversedMethodCallDetails, $fieldName, $detail);
                $validations = array_merge($validations, $newRules['validationRules']);

                if (isset($newRules['table']) && $newRules['table']) {
                    $tableName = $newRules['table'];
                }
            }

            if ($fieldName) {
                $validationKey = $tableName ?: $fieldName;
                $validation[$validationKey] = $validations;
            } else {
                $this->handleSpecialMethods($reversedMethodCallDetails[0]['name']->name, $validation);
            }
        }
        return $validation;
    }

    /**
     * Handles special method names and updates the validation rules accordingly.
     *
     * @param string $methodName The name of the special method.
     * @param array $validation Reference to the array of validation rules to be updated.
     */
    protected function handleSpecialMethods(string $methodName, array &$validation)
    {
        switch ($methodName) {
            case 'timestamps':
                $validation['created_at'] = 'date';
                $validation['updated_at'] = 'date';
                break;
            case 'nullableTimestamps':
                $validation['created_at'] = ['date', 'nullable'];
                $validation['updated_at'] = ['date', 'nullable'];
                break;
            case 'id':
            default:
                // Handle other special methods if necessary
                break;
        }
    }

    /**
     * Extracts details from a method call node, including its name and arguments.
     * If the method call is nested, it extracts details from the nested calls as well.
     *
     * @param Node $node The node from which method call details are to be extracted.
     * @return array An array containing details of the method calls.
     */
    protected function extractMethodCallDetails(Node $node): array
    {
        $methodCallDetails = [];

        if ($node instanceof MethodCall) {
            // Extract details from the current MethodCall node
            $currentDetails = [
                'name' => $node->name instanceof Identifier ? $node->name : null,
                'args' => is_array($node->args) ? array_map(function (Arg $arg) {
                    return $arg->value;
                }, $node->args) : []
            ];
            $methodCallDetails[] = $currentDetails;

            // If there's a nested MethodCall, extract its details as well
            if ($node->var instanceof MethodCall) {
                $nestedDetails = $this->extractMethodCallDetails($node->var);
                $methodCallDetails = array_merge($methodCallDetails, $nestedDetails);
            }
        }

        return $methodCallDetails;
    }

    /**
     * Generates validation rules based on the field type and its specific characteristics.
     *
     * @param array $wholeLine Array representing the entire line of schema definition.
     * @param string|null $stringFieldName The name of the field for which rules are being generated.
     * @param array $expr Array containing details about the field type and attributes.
     * @return array An array with 'validationRules' and optionally 'table' if it's a foreign key.
     */
    #[ArrayShape(['validationRules' => "array", 'table' => "mixed|null|string"])]
    protected function getRuleForFieldWithName(array $wholeLine, ?string $stringFieldName, array $expr): array
    {
        $validationRules = [];
        $name = count($expr) > 0 ? $expr['name']->name : '';
        switch ($name) {
            case 'string':
            case 'char':
            case 'text':
            case 'mediumText':
            case 'longText':
                $validationRules[] = 'string';
                $validationRules[] = $this->handleStringType($expr);
                break;
            case 'integer':
                $validationRules[] = 'integer';
                $validationRules[] = 'min:-2147483648';
                $validationRules[] = 'max:2147483647';
                break;
            case 'tinyInteger':
                $validationRules[] = 'integer';
                $validationRules[] = 'min:-127';
                $validationRules[] = 'max:127';
                break;
            case 'smallInteger':
                $validationRules[] = 'integer';
                $validationRules[] = 'min:-32767';
                $validationRules[] = 'max:32767';
                break;
            case 'mediumInteger':
                $validationRules[] = 'integer';
                $validationRules[] = 'min:-8388607';
                $validationRules[] = 'max:8388607';
                break;
            case 'unsignedInteger':
                $validationRules[] = 'integer';
                $validationRules[] = 'min:0';
                $validationRules[] = 'max:2147483647';
                break;
            case 'unsignedTinyInteger':
                $validationRules[] = 'integer';
                $validationRules[] = 'min:0';
                $validationRules[] = 'max:127';
                break;
            case 'unsignedSmallInteger':
                $validationRules[] = 'integer';
                $validationRules[] = 'min:0';
                $validationRules[] = 'max:32767';
                break;
            case 'unsignedMediumInteger':
                $validationRules[] = 'integer';
                $validationRules[] = 'min:0';
                $validationRules[] = 'max:8388607';
                break;
            case 'unsignedBigInteger':
                $validationRules[] = 'integer';
                $validationRules[] = 'min:0';
                $validationRules[] = 'max:9223372036854775807';
                break;
            case 'bigInteger':
            case 'increments':
            case 'tinyIncrements':
            case 'smallIncrements':
            case 'mediumIncrements':
            case 'bigIncrements':
                $validationRules[] = 'integer';
                $validationRules[] = 'min:-9223372036854775808';
                $validationRules[] = 'max:9223372036854775807';
                break;
            case 'unsigned':
                $validationRules[] = 'integer';
                $validationRules[] = 'min:0';
                break;
            case 'float':
            case 'double':
            case 'decimal':
                $validationRules[] = 'numeric';
                break;
            case 'boolean':
                $validationRules[] = 'boolean';
                break;
            case 'enum':
                $validationRules[] = $this->handleEnumType($expr);
                break;
            case 'json':
            case 'jsonb':
            case 'collation':
            case 'charset':
                $validationRules[] = 'json';
                break;
            case 'date':
            case 'dateTime':
            case 'dateTimeTz':
            case 'time':
            case 'timeTz':
            case 'timestamp':
            case 'useCurrent':
            case 'timestamps':
            case 'timestampTz':
                $validationRules[] = 'date';
                break;
            case 'nullable':
                $validationRules[] = 'nullable';
                break;
            case 'default':
                $validationRules[] = 'default:' . $expr['args'][0]->value;
                break;
            case 'unique':
                // Assuming the first parameter is the table name and the second is the column name
                if ($this->tableName && $stringFieldName) {
                    $validationRules[] = "unique:{$this->tableName},{$stringFieldName}";
                }
                $validationRules[] = 'required';
                break;
            case 'primary':
                $validationRules[] = 'primary';
                break;
            case 'foreign':
                // Assuming the first parameter is the column name and the second is the referenced table name
                $result = $this->handleForeignType($wholeLine);
                $validationRules[] = $result['validation'];
                break;
            case 'foreignIdFor':
                // Assuming the first parameter is the column name and the second is the referenced table name
                $result = $this->handleForeignIdForType($expr);
                $validationRules[] = $result['validation'];
                break;
            case 'nullableTimestamps':
                $validationRules[] = 'nullable';
                $validationRules[] = 'date';
                break;
            case 'binary':
                $validationRules[] = 'blob';
                break;
            case 'change':
            case 'index':
            case 'dropTimestamps':
            case 'first':
            case 'after':

            default:
                // Handle unknown methods
                break;
        }

        return ['validationRules' => $validationRules, 'table' => $result['table'] ?? null];
    }

    /**
     * Generates a validation rule for string types based on the given expression.
     *
     * This method examines the provided expression to determine the maximum length
     * of a string field. It then constructs a validation rule string that can be
     * used in Laravel validation system.
     *
     * @param array $expr The expression array derived from the abstract syntax tree (AST)
     *                    of a migration file, representing a column definition.
     * @return string A string representing the Laravel validation rule for the string type.
     */
    protected function handleStringType(array $expr): string
    {
        return count($expr['args']) === 2 && $expr['args'][1] instanceof LNumber
            ? 'max:' . $expr['args'][1]->value
            : 'max:255';
    }

    /**
     * Handles the enumeration type by generating a validation rule based on the enum values.
     *
     * @param array $expr Expression array representing the enum field definition.
     * @return string A validation rule string.
     * @throws InvalidArgumentException Thrown when the provided argument is invalid.
     */
    protected function handleEnumType(array $expr): string
    {
        if (count($expr['args']) === 2 && $expr['args'][1] instanceof Array_) {
            $arrayValues = [];
            foreach ($expr['args'][1]->items as $item) {
                if ($item->value instanceof String_) {
                    $arrayValues[] = $item->value->value;
                }
            }
            return 'in:' . implode(',', $arrayValues);
        }
        throw new InvalidArgumentException("Invalid argument provided to Enum");
    }

    /**
     * Handles the 'foreignIdFor' type by generating a validation rule based on the foreign key relationship.
     *
     * @param array $expr Expression array representing the foreignIdFor field definition.
     * @return array An array containing the foreign table name and the validation rule.
     * @throws InvalidArgumentException Thrown when the provided argument is invalid.
     */
    #[ArrayShape(['table' => "string", 'validation' => "string"])]
    protected function handleForeignIdForType(array $expr): array
    {
        if (!($expr['args'][0] instanceof ClassConstFetch && $expr['args'][0]->class->isFullyQualified())) {
            throw new InvalidArgumentException("Invalid argument provided to ForeignIdFor");
        }

        $modelClass = $expr['args'][0]->class->toCodeString();
        $modelInstance = new $modelClass;
        $tableName = $modelInstance->getTable();

        $foreignKey = Str::singular($tableName) . '_id';
        $referenceColumn = 'id';

        if (isset($expr['args'][1]) && $expr['args'][1] instanceof String_) {
            $referenceColumn = $expr['args'][1]->value;
        }

        return [
            'table' => $foreignKey,
            'validation' => 'exists:' . $tableName . ',' . $referenceColumn,
        ];
    }

    /**
     * Handles the 'foreign' type by constructing a validation rule based on foreign key constraints.
     *
     * @param array $foreignDetails An array of method call details related to the foreign key definition.
     * @return array An array containing the foreign key and the validation rule.
     * @throws InvalidArgumentException Thrown when the foreign key or referenced table is not provided.
     */
    #[ArrayShape(['table' => "mixed", 'validation' => "string"])]
    protected function handleForeignType(array $foreignDetails): array
    {
        $foreignKey = null;
        $referencedColumn = 'id'; // Default
        $referencedTable = null;

        foreach ($foreignDetails as $detail) {
            switch ($detail['name']->name) {
                case 'foreign':
                    $foreignKey = $detail['args'][0]->value;
                    break;
                case 'references':
                    $referencedColumn = $detail['args'][0]->value;
                    break;
                case 'on':
                    $referencedTable = $detail['args'][0]->value;
                    break;
                default:
                    break;
            }
        }

        if (!$foreignKey || !$referencedTable) {
            throw new InvalidArgumentException("Foreign key or referenced table not provided");
        }

        return [
            'table' => $foreignKey,
            'validation' => 'exists:' . $referencedTable . ',' . $referencedColumn
        ];
    }
}
