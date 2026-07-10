<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->statefulApi();
        $middleware->validateCsrfTokens(except: [
            'api/*', // pastikan ini ada jika pakai CSRF
        ]);
        $middleware->redirectTo(
            guests: '/admin/login',
            users: '/admin/dashboard'
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
