<?php

namespace KirschbaumDevelopment\RouteFileMacro;

use SplFileInfo;
use Illuminate\Support\Facades\Route;

class RouteMacros
{
    public function file()
    {
        return function ($file) {
            $this->generateRouteGroupForFile($file);
        };
    }

    public function files()
    {
        return function ($files) {
            collect($files)->each(function ($file) {
                $this->generateRouteGroupForFile($file);
            });
        };
    }

    protected function generateRouteGroupForFile()
    {
        return function ($file) {
            $path = ($file instanceof SplFileInfo) ? $file->getRealPath() : $file;

            Route::group([], $path);
        };
    }
}
