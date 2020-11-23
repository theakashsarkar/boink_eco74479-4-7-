<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\category;
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
        View::composer('frontEnd.include.header',function($view){
           $view->with('categories',category::where('publication_status',1)->get());
        });
        View::composer('frontEnd.include.footer',function ($view){
            $view->with('categories',category::where('publication_status',1)->get());
        });
    }
}
