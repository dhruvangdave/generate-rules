<?php

namespace Dhruvang\GenerateRules\App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RuleGeneratorInput extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:rule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to generate rules from migration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate:status');
        $output = Artisan::output();

        $lines = explode(PHP_EOL, $output);
        $lines = array_filter($lines);
        $counter = 1;
        array_shift($lines);
        $migrationCount = count($lines);

        if ($migrationCount === 0) {
            $this->error('No migrations found.');
            return; // Exit if no migrations are available
        }

        $this->info('Migrations name');

        foreach ($lines as $line) {
            // Extract migration name from the line
            $matches = [];
            if (preg_match('/^\s+(\S+)/', $line, $matches)) {
                $migrationName = $matches[1];
                $this->line("$counter. $migrationName");
                $counter++;
            }
        }

        $this->info("Total number of migrations: $migrationCount");

        do {
            $selectedNumber = $this->ask('Please select a migration by entering its number');
            if ($selectedNumber < 1 || $selectedNumber > $migrationCount) {
                $this->error("Invalid input. Please enter a number between 1 and $migrationCount.");
            }

        } while ($selectedNumber < 1 || $selectedNumber > $migrationCount);

        $selectedMigration = $this->getMigrationNameByNumber($lines, $selectedNumber);

        $this->comment("You have selected migration $selectedNumber: $selectedMigration");

        if ($this->confirm('Do you want to continue?')) {
            $this->info('Continuing...');
            Artisan::call('generate:ruleFromMigration', [
                'migration' => $selectedMigration,
                '--caller' => self::class,
            ]);

            $paths = Artisan::output();

            $decodedPaths = json_decode($paths);
            if (is_array($decodedPaths) && !empty($decodedPaths)) {
                foreach ($decodedPaths as $path) {
                    $this->infoMessage("Request file created at [{$path}] successfully.");
                }
            }
        } else {
            $this->info('Cancelled.');
        }
    }

    public static function infoMessage($message) {
        // ANSI escape code for green text
        $green = "\033[34m";

        // ANSI escape code for no color (reset)
        $reset = "\033[0m";

        echo "{$green}INFO  {$reset}{$message}\n";
    }

    protected function getMigrationNameByNumber(array $lines, $selectedNumber)
    {
        $counter = 1;

        foreach ($lines as $line) {
            $matches = [];
            if (preg_match('/^\s+(\S+)/', $line, $matches)) {
                $migrationName = $matches[1];
                if ($counter == $selectedNumber) {
                    return $migrationName;
                }
                $counter++;
            }
        }

        return null;
    }
}
