<?php

namespace Dhruvang\GenerateRules;

use Dhruvang\GenerateRules\App\Console\Commands\RuleGenerator;
use Dhruvang\GenerateRules\App\Console\Commands\RuleGeneratorInput;
use Illuminate\Support\ServiceProvider;

class GenerateRulesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'generateRules');

        if ($this->app->runningInConsole()) {
            $this->commands([
                RuleGenerator::class,
                RuleGeneratorInput::class,
            ]);
        }
    }
}
