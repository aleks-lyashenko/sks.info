<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Rubric;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {
            // Показываем какие sql-запросы отправлены при работе скрипта
            // dump($query->sql);
            //Записываем sql-запросы в лог
            Log::info($query->sql);

            //Регистрируем шаблон bootstrap для пагинации
            Paginator::useBootstrap();

            //Регистрируем View Composer
            view()->composer('layouts.footer', function($view) {
                $view->with('rubrics', Rubric::all());
            });
        });
    }
}
