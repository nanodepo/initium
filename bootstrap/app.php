<?php

use App\Console\Commands\MakeDomainCommand;
use App\Middlewares\Authenticate;
use App\Middlewares\CheckRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/app.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/status',
        then: function () {
            Route::middleware(['web', 'guest'])
                ->group(base_path('routes/auth.php'));
        },
    )
    ->withCommands([
        MakeDomainCommand::class,
    ])
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            'webhook/*',
        ]);
        $middleware->alias([
            'auth' => Authenticate::class,
            'role' => CheckRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
