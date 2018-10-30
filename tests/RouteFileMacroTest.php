<?php

namespace KirschbaumDevelopment\RouteFileMacro\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class RouteFileMacroTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return ['KirschbaumDevelopment\RouteFileMacro\RouteFileMacroServiceProvider'];
    }

    /** @test */
    public function it_provides_route_file_macro()
    {
        $this->assertTrue(Route::hasMacro('file'));
    }

    /** @test **/
    public function it_loads_a_route_from_a_file_path()
    {
        Route::file(__DIR__.'/routes/test-route-1.php');

        $this->refreshNamedRoutes();

        $this->assertTrue(Route::has('test-route-1'));
    }

    /** @test **/
    public function it_loads_multiple_routes_from_an_array_of_file_paths()
    {
        Route::file([
            __DIR__.'/routes/test-route-1.php',
            __DIR__.'/routes/test-route-2.php',
        ]);

        $this->refreshNamedRoutes();

        $this->assertTrue(Route::has('test-route-1'));
        $this->assertTrue(Route::has('test-route-2'));
    }

    /** @test **/
    public function it_loads_route_files_from_a_file_object()
    {
        $files = File::files(__DIR__.'/routes');

        Route::file($files);

        $this->refreshNamedRoutes();

        $this->assertTrue(Route::has('test-route-1'));
        $this->assertTrue(Route::has('test-route-2'));
    }

    protected function refreshNamedRoutes()
    {
        app('router')->getRoutes()->refreshNameLookups();
    }
}
