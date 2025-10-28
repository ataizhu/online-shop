<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // Customizing The Pagination View Using Bootstrap (displaying Laravel pagination using Bootstrap pagination): https://laravel.com/docs/9.x/pagination#using-bootstrap
        \Illuminate\Pagination\Paginator::useBootstrap();

        // Force HTTPS for ngrok and production
        if (config('app.env') !== 'local' || isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}