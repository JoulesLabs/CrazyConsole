<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(fn (\Illuminate\Http\Request $request) => route('auth.login.page'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->report(function (\Illuminate\Validation\ValidationException $e) {
            dd($e->validator->errors());
        });

    })->create();
