<?php 

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Debug\ExceptionHandler;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up'
    )
    ->withMiddleware(function ($middleware) {
        // Assuming no specific middleware needs to be passed here, 
        // just configure or add middleware
        // $middleware->push(SomeMiddleware::class);
    })
    ->withExceptions(function ($exceptions) {
        // Configure exception handling if needed
        // $exceptions->handle(SomeException::class, SomeExceptionHandler::class);
    })
    ->create();

$app->singleton(HttpKernel::class, App\Http\Kernel::class);
$app->singleton(ConsoleKernel::class, App\Console\Kernel::class);
$app->singleton(ExceptionHandler::class, App\Exceptions\Handler::class);

return $app;

