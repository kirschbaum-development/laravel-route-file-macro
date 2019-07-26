<?php

namespace KirschbaumDevelopment\RouteFileMacro;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteFileMacroServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Route::mixin(new RouteMacros);
    }
}
