<?php

namespace App\Providers;

use App\AddingCart;
use App\ProductDetail;
use Illuminate\Support\Facades\View as ViewAlias;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        ViewAlias::share('categories', ProductDetail::distinct()->select('category')->get());

        /*
        View::composer('*', function (\Illuminate\Support\Facades\View $view) {
            $view->with('categories', ProductDetail::all()->sortBy('category'));
        });
    */
    }
}
