<?php

namespace Tests;

use KirschbaumDevelopment\RouteFileMacro\RouteFileMacroServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [RouteFileMacroServiceProvider::class];
    }
}
