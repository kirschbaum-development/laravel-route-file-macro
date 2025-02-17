<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

test('has the route file macros', function () {
    expect(Route::hasMacro('file'))->toBeTrue();
    expect(Route::hasMacro('files'))->toBeTrue();
});

test('loads routes from single file path', function () {
    Route::file(__DIR__ . '/../routes/test-route-1.php');

    refreshNamedRoutes();

    expect(Route::has('test-route-1'))->toBeTrue();
});

test('loads routes from single file info object', function () {
    $file = File::files(__DIR__ . '/../routes');

    Route::file($file[0]);

    refreshNamedRoutes();

    expect(Route::has('test-route-1'))->toBeTrue();
});

test('loads routes from multiple file paths', function () {
    Route::files([
        __DIR__ . '/../routes/test-route-1.php',
        __DIR__ . '/../routes/test-route-2.php',
    ]);

    refreshNamedRoutes();

    expect(Route::has('test-route-1'))->toBeTrue();
    expect(Route::has('test-route-2'))->toBeTrue();
});

test('loads routes from multiple file info objects', function () {
    $files = File::files(__DIR__ . '/../routes');

    Route::files($files);

    refreshNamedRoutes();

    expect(Route::has('test-route-1'))->toBeTrue();
    expect(Route::has('test-route-2'))->toBeTrue();
});

/**
 * Refresh the named routes.
 *
 * @return void
 */
function refreshNamedRoutes()
{
    app('router')->getRoutes()->refreshNameLookups();
}
