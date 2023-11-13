<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
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
        View::composer(['*'], function ($view){
            $frameworks = [
                'title' => 'Альтернативы',
                'items' => ['Angular', 'React.js', 'Vue.js', 'Dojo 2', 'Ember'],
            ];

            $criterias = [
                'title' => 'Критерии',
                'items' => ['Время разработки', 'Сложность разработки', 'Технологические возможности', 'Спрос', 'Сложность внедрения'],
            ];

            $view->with([
                'frameworks' => $frameworks,
                'criterias' => $criterias,
            ]);
        });
    }
}
