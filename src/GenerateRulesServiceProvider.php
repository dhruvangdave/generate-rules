<?php

namespace Dhruvang\GenerateRules;

use Dhruvang\GenerateRules\App\Console\Commands\RuleGenerator;
use Dhruvang\GenerateRules\App\Console\Commands\RuleGeneratorInput;
use Illuminate\Support\Facades\Route;
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
        $this->registerRoutes();
        $this->registerCommands();
        $this->registerPublishing();

        Route::middlewareGroup('generateRules', config('generateRules.middleware', []));
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'generateRules');

    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        });
    }

    /**
     * Get the Telescope route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'domain' => config('generateRules.domain', null),
            'namespace' => 'Dhruvang\GenerateRules\Http\Controllers',
            'prefix' => config('generateRules.path'),
            'middleware' => 'generateRules',
        ];
    }

    /**
     * Register the package's commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RuleGenerator::class,
                RuleGeneratorInput::class,
            ]);
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/generateRules'),
            ], ['generateRules-assets', 'laravel-assets']);

            $this->publishes([
                __DIR__.'/../config/generateRules.php' => config_path('generateRules.php'),
            ], 'generateRules-config');
        }
    }
}
