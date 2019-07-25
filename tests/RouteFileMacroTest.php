<?php

namespace KirschbaumDevelopment\RouteFileMacro\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use KirschbaumDevelopment\RouteFileMacro\RouteFileMacroServiceProvider;

class RouteFileMacroTest extends TestCase
{
    /** @test */
    public function hasTheRouteFileMacros()
    {
        $this->assertTrue(Route::hasMacro('file'));
        $this->assertTrue(Route::hasMacro('files'));
    }

    /** @test **/
    public function loadsRoutesFromSingleFilePath()
    {
        Route::file(__DIR__ . '/routes/test-route-1.php');

        $this->refreshNamedRoutes();

        $this->assertTrue(Route::has('test-route-1'));
    }

    /** @test **/
    public function loadsRoutesFromSingleFileInfoObject()
    {
        $file = File::files(__DIR__ . '/routes');

        Route::file($file[0]);

        $this->refreshNamedRoutes();

        $this->assertTrue(Route::has('test-route-1'));
    }

    /** @test **/
    public function loadsRoutesFromMultipleFilePaths()
    {
        Route::files([
            __DIR__ . '/routes/test-route-1.php',
            __DIR__ . '/routes/test-route-2.php',
        ]);

        $this->refreshNamedRoutes();

        $this->assertTrue(Route::has('test-route-1'));
        $this->assertTrue(Route::has('test-route-2'));
    }

    /** @test **/
    public function loadsRoutesFromMultipleFileInfoObjects()
    {
        $files = File::files(__DIR__ . '/routes');

        Route::files($files);

        $this->refreshNamedRoutes();

        $this->assertTrue(Route::has('test-route-1'));
        $this->assertTrue(Route::has('test-route-2'));
    }

    protected function getPackageProviders($app)
    {
        return [RouteFileMacroServiceProvider::class];
    }

    protected function refreshNamedRoutes()
    {
        app('router')->getRoutes()->refreshNameLookups();
    }
}
