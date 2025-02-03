<?php

declare(strict_types=1);

namespace Ziming\LaravelDocparser\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ziming\LaravelDocparser\LaravelDocparser
 */
class LaravelDocparser extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Ziming\LaravelDocparser\LaravelDocparser::class;
    }
}
