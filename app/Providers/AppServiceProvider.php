<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Cart;

use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {
            $view->with('categories', Category::all());
            $view->with('brands', Brand::all());
            $view->with('cartProducts', Cart::getContent());
        });
        // view()->composer('*', function ($view) {
        // });

    }
}
