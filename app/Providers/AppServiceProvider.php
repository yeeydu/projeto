<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

use App\Pagina;
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
        // View composer for footer
        View::composer(['master.footer'], function($view){
            $pagina = Pagina::where('title','contactos')->first();
            $view->with('pagina', $pagina);
    }); 


    Blade::directive('money',function ($amount){
        return "$amount.' €'";
    });
     
    }
}
