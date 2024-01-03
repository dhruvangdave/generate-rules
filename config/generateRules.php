<?php

use Dhruvang\GenerateRules\Http\Middleware\Authorize;

return [

    /*
    |--------------------------------------------------------------------------
    | GenerateRules Domain
    |--------------------------------------------------------------------------
    |
    | This is the subdomain where GenerateRules will be accessible from. If the
    | setting is null, GenerateRules will reside under the same domain as the
    | application. Otherwise, this value will be used as the subdomain.
    |
    */

    'domain' => env('GENERATE_RULES_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | GenerateRules Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where GenerateRules will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => env('GENERATE_RULES_PATH', 'generate-rules'),

    /*
    |--------------------------------------------------------------------------
    | GenerateRules Storage Driver
    |--------------------------------------------------------------------------
    |
    | This configuration options determines the storage driver that will
    | be used to store GenerateRules's data. In addition, you may set any
    | custom options as needed by the particular driver you choose.
    |
    */

    'driver' => env('GENERATE_RULES_DRIVER', 'database'),

    'storage' => [
        'database' => [
            'connection' => env('DB_CONNECTION', 'mysql'),
            'chunk' => 1000,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | GenerateRules Master Switch
    |--------------------------------------------------------------------------
    |
    | This option may be used to disable all GenerateRules watchers regardless
    | of their individual configuration, which simply provides a single
    | and convenient way to enable or disable GenerateRules data storage.
    |
    */

    'enabled' => env('GENERATE_RULES_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | GenerateRules Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every GenerateRules route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => [
        'web',
        Authorize::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Allowed / Ignored Paths & Commands
    |--------------------------------------------------------------------------
    |
    | The following array lists the URI paths and Artisan commands that will
    | not be watched by GenerateRules. In addition to this list, some Laravel
    | commands, like migrations and queue commands, are always ignored.
    |
    */

    'only_paths' => [
        // 'api/*'
    ],

    'ignore_paths' => [
        'livewire*',
        'nova-api*',
        'pulse*',
    ],

    'ignore_commands' => [
        //
    ],
];
