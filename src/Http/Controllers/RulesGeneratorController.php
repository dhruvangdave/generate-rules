<?php

namespace Dhruvang\GenerateRules\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;
use PhpParser\Error;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\Closure;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Param;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;
use PhpParser\ParserFactory;
use \InvalidArgumentException;

class RulesGeneratorController extends Controller
{
    private array $validations = [];
    private string $tableName = '';

    /**
     * Display the GenerateRules view.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $packageBasePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';
        $stubPath = $packageBasePath . DIRECTORY_SEPARATOR . 'stubs' . DIRECTORY_SEPARATOR . 'defaultRuleGeneratorInput.stub';

        $content = file_get_contents($stubPath);

        if (!$content) {
            return response()->json([
                'error' => 'Unable to read the file',
            ], 500);
        }

        return response()->json([
            'entries' => 'Okay',
            'status' => 'Status',
            'userInput' => $content
        ]);
    }

    /**
     * Show the form for generating new rules.
     */
    public function generate(Request $request): JsonResponse
    {
        $parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        try {
            $parsedData = $parser->parse($request->get('data') ?? '');

            // Check if parsed data is empty or not an array
            if (empty($parsedData) || !is_array($parsedData)) {
                return response()->json(['error' => 'Invalid input data.'], 422);
            }

            $expr = $parsedData[0]->expr ?? null;
            if (!$expr) {
                return response()->json(['error' => 'Please provide "<?php" at the beginning'], 422);
            }
            if ($expr instanceof Closure && !empty($expr->getParams()) && $expr->getParams()[0] instanceof Param) {
                $closureStmts = $expr->getStmts();
                foreach ($closureStmts as $statement) {
                    $this->validations[] = $this->processClosureStatement($statement);
                }

                $consolidatedValidations = $this->consolidateValidations($this->validations);
                $formattedCode = $this->formatValidationRules($consolidatedValidations);

                return response()->json(['rules' => $formattedCode]);
            } else {
                return response()->json(['error' => 'Invalid closure format or missing parameters.'], 422);
            }
        } catch (Error $e) {
            // Log the error for debugging purposes
            dd($e->getMessage());

            // Return a user-friendly error message
            return response()->json(['error' => 'An error occurred while parsing the data.'], 500);
        }
    }


    protected function formatValidationRules($validations): string
    {
        $formattedString = "<?php\n\nreturn [\n";

        foreach ($validations as $field => $rules) {
            $formattedRules = array_map(function($rule) {
                return "'$rule'";
            }, $rules);

            $formattedString .= "    '$field' => [" . implode(', ', $formattedRules) . "],\n";
        }

        $formattedString .= "];\n";

        return $formattedString;
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
}
