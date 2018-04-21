<?php

namespace App\Providers\Admin;

use App\Product;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Product::creating(function($product) {
            $product->slug = str_slug($product->name);
        });

        
        Product::updating(function($product) {
            $product->slug = str_slug($product->name);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
