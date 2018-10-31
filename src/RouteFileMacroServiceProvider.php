<?php

namespace KirschbaumDevelopment\RouteFileMacro;

use SplFileInfo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteFileMacroServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerRouteFileMacro();
    }

    protected function registerRouteFileMacro()
    {
        Route::macro('file', function ($file) {
            collect(array_wrap($file))->each(function ($file) {
                $path = ($file instanceof SplFileInfo) ? $file->getRealPath() : $file;
                Route::group([], $path);
            });
        });
    }
}
