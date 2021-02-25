<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product;
use App\Brand;
use Illuminate\Support\Facades\Schema;

class ModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191); //NEW: Increase StringLength
        Product::observe(\App\Observers\ProductOberver::class);
        Brand::observe(\App\Observers\BrandObserver::class);
    }
}
