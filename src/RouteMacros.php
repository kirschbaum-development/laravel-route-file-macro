<?php

namespace KirschbaumDevelopment\RouteFileMacro;

use SplFileInfo;
use Illuminate\Support\Facades\Route;

class RouteMacros
{
    /**
     * Load routes from a file.
     *
     * @return \Closure
     */
    public function file()
    {
        return function ($file) {
            $this->generateRouteGroupForFile($file);
        };
    }

    /**
     * Load routes from multiple files.
     *
     * @return \Closure
     */
    public function files()
    {
        return function ($files) {
            collect($files)->each(function ($file) {
                $this->generateRouteGroupForFile($file);
            });
        };
    }

    /**
     * Generate the route group for a the passed file.
     *
     * @return \Closure
     */
    protected function generateRouteGroupForFile()
    {
        return function ($file) {
            $path = ($file instanceof SplFileInfo) ? $file->getRealPath() : $file;

            Route::group([], $path);
        };
    }
}
