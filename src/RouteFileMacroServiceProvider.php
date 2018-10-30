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
            $files = (!is_array($file)) ? [$file] : $file;

            foreach ($files as $file) {
                $path = ($file instanceof SplFileInfo) ? $file->getRealPath() : $file;

                Route::group([], $path);
            }
        });
    }
}
