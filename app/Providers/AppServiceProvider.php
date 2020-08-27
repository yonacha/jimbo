<?php

namespace App\Providers;

use App\CartManagement\TemporaryCartContract;
use App\CartManagement\TemporaryCartDatabase;
use App\CartManagement\TemporaryCartRedis;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TemporaryCartContract::class,function ($app){
            if (request()->has('guest')){
                return new TemporaryCartRedis();
            }
            else{
                return new TemporaryCartDatabase();
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
