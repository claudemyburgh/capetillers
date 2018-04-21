<?php

namespace App\Providers;

use App\Http\ViewComposers\ContactComposer;
use App\Http\ViewComposers\NavComposer;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('layouts.partials._menu', NavComposer::class);
        view()->composer('*', NavComposer::class);
        
        view()->composer(['layouts.partials._contact_list', 'layouts.partials._contact_names'], ContactComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(NavComposer::class);
    }
}
