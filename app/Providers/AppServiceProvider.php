<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FormValidationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FormValidationService::class, function ($app) {
            return new FormValidationService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
