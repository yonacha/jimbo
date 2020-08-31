<?php

namespace App\Providers;

use App\CartManagement\TemporaryCartContract;
use App\CartManagement\TemporaryCartDatabase;
use App\CartManagement\TemporaryCartRedis;
use App\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use http\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
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
        $this->app->singleton(TemporaryCartContract::class, function ($app) {
            if (request()->has('guest')) {
                if (request()->has('sessionKey')) {
                    return new TemporaryCartRedis(request('sessionKey'));
                } else {
                    return new TemporaryCartRedis(session()->get('_token'));
                }
            } else {
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

        view()->composer(
            'layouts.navbars.navs.guest', function ($view) {

            $client = new Client();

            $response = $client->request('GET', 'http://jimbo.p24/temporary/cart/items?guest=true&sessionKey=' . session()->get("_token"));

            $response = json_decode($response->getBody());

            $products = array();

            foreach ($response as $item) {
                array_push($products, [Product::find($item->product_id)->toArray(), $item->quantity]);
            }

            if (empty($products)) {
                $view->with('cartRedis', false);
            } else {
                $view->with('cartRedis', json_encode($products));
            }


        }
        );

        view()->composer(
            'layouts.navbars.navs.auth', function ($view) {
            $view->with('cartDatabase', Auth::user()->temporaryCarts()->first()->cartDetails()->getResults());
        }
        );
    }
}
