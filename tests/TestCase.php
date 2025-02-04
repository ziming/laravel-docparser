<?php

declare(strict_types=1);

namespace Ziming\LaravelDocparser\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Ziming\LaravelDocparser\LaravelDocparserServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaravelDocparserServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
    }
}
