<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Category::creating(function($query){
            $query->slug = str_slug($query->name);
        });

        Category::updating(function($query){
            $query->slug = str_slug($query->name);
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
