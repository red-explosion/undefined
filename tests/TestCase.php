<?php

declare(strict_types=1);

namespace RedExplosion\Undefined\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use RedExplosion\Undefined\UndefinedServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            UndefinedServiceProvider::class,
        ];
    }
}
