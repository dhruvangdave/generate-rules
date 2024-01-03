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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'generateRules');

        Route::middlewareGroup('generateRules', config('generateRules.middleware', []));

        $this->registerCommands();

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/generateRules'),
        ], ['generateRules-assets', 'laravel-assets']);
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
}
