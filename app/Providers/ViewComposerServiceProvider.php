<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('site.partials.nav', function ($view) {
            $view->with('categories', Category::where('menu', 1)->orderByRaw('-name ASC')->get()->noCleaning()->nest());
        });
        /*View::composer('site.partials.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });*/
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
