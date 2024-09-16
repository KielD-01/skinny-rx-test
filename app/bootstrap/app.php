<?php

use App\Traits\JsonResponseHelper;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::prefix('api/v1')
                ->name('v1.')
                ->withoutMiddleware('csrf')
                ->group(base_path('routes/api.php'));
        }
    )
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Exception $e) {
            $body =  match (get_class($e)) {
                ValidationException::class => [
                    collect($e?->errors() ?? [])->flatten()->toArray(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                ],
                default => [[$e->getMessage()]],
            };

            return JsonResponseHelper::error(...$body);
        });
    })->create();
