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

        $middleware->alias([
            'api.token' => \App\Http\Middleware\ApiTokenMiddleware::class,
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);

    })

    ->withExceptions(function (Exceptions $exceptions): void {

        /*
        |--------------------------------------------------------------------------
        | 404 Page Not Found
        |--------------------------------------------------------------------------
        */

        $exceptions->render(function (
            \Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e,
            $request
        ) {

            return redirect('/');

        });

        /*
        |--------------------------------------------------------------------------
        | 403 Unauthorized Access
        |--------------------------------------------------------------------------
        */

        $exceptions->render(function (
            \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException $e,
            $request
        ) {

            return redirect('/')
                ->with('error', 'Unauthorized Access');

        });

    })->create();