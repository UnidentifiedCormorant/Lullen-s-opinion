<?php

namespace App\Providers;

use App\Services\Abstracts\StageInterface;
use App\Services\Abstracts\VectorInterface;
use App\Services\StageService;
use App\Services\VectorService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $singletons = [
        StageInterface::class => StageService::class,
        VectorInterface::class => VectorService::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
