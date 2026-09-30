<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

if (! file_exists(dirname(__DIR__).'/.env') && file_exists(dirname(__DIR__).'/production.env')) {
    @copy(dirname(__DIR__).'/production.env', dirname(__DIR__).'/.env');
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e, Request $request) {
            if ($request->has('debug') || $request->expectsJson() || $request->is('api/*')) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'class' => get_class($e),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => collect($e->getTrace())->take(5)->map(fn ($t) => ($t['file'] ?? '').':'.($t['line'] ?? '').' '.($t['function'] ?? '')),
                ], 500);
            }
        });
    })->create();
