<?php

use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Application;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Hanya daftarkan alias middleware
        $middleware->alias([
            'user' => \App\Http\Middleware\UserMiddleware::class,
            'updateLastLogin' => \App\Http\Middleware\UpdateLastLoginAt::class,
            'role.redirect' => \App\Http\Middleware\RedirectBasedOnRole::class,
            'check.company' => \App\Http\Middleware\CheckCompanyProfile::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
