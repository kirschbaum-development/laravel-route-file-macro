<?php

namespace KirschbaumDevelopment\RouteFileMacro;

use SplFileInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class RouteMacros
{
    public function file()
    {
        return $this->getFiles();
    }

    public function files()
    {
        return $this->getFiles();
    }

    protected function getFiles()
    {
        return function ($file) {
            collect(Arr::wrap($file))->each(function ($file) {
                $path = ($file instanceof SplFileInfo) ? $file->getRealPath() : $file;
                Route::group([], $path);
            });
        };
    }
}
