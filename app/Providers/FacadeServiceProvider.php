<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Flugg\Responder\Facades\Responder;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('responder',function($app){
            return new Responder();
        });
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
