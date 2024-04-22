<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Application\Console\Commands\FetchPostsUsingFeed;

return Application::configure(basePath: dirname(__DIR__))
    ->withCommands([
        FetchPostsUsingFeed::class,
    ])
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
