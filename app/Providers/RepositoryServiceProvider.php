<?php

namespace App\Providers;

use App\Repositories\Abstracts\StageRepositoryInterface;
use App\Repositories\StageRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $singletons = [
        StageRepositoryInterface::class => StageRepositoryEloquent::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
