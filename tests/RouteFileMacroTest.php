<?php

namespace KirschbaumDevelopment\RouteFileMacro\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class RouteFileMacroTest extends TestCase
{
    /** @test */
    public function hasTheRouteFileMacros()
    {
        $this->assertTrue(Route::hasMacro('file'));
        $this->assertTrue(Route::hasMacro('files'));
    }

    /** @test **/
    public function loadsRouteFromFilePath()
    {
        Route::file(__DIR__ . '/routes/test-route-1.php');

        $this->refreshNamedRoutes();

        $this->assertTrue(Route::has('test-route-1'));
    }

    /** @test **/
    public function loadsMultipleRoutesFromAnArrayOfFilePaths()
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
    public function loadsRouteFilesFromFileObject()
    {
        $files = File::files(__DIR__ . '/routes');

        Route::files($files);

        $this->refreshNamedRoutes();

        $this->assertTrue(Route::has('test-route-1'));
        $this->assertTrue(Route::has('test-route-2'));
    }

    protected function getPackageProviders($app)
    {
        return ['KirschbaumDevelopment\RouteFileMacro\RouteFileMacroServiceProvider'];
    }

    protected function refreshNamedRoutes()
    {
        app('router')->getRoutes()->refreshNameLookups();
    }
}
