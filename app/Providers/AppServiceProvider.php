<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register sidebar components
        Blade::componentNamespace('App\\View\\Components\\Sidebar', 'sidebar');
        
        // Register other component namespaces
        Blade::componentNamespace('App\\View\\Components\\Cards', 'Cards');
        Blade::componentNamespace('App\\View\\Components\\Auth', 'auth');
        Blade::componentNamespace('App\\View\\Components\\Drawer', 'drawer');
    }
}
