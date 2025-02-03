<?php

declare(strict_types=1);

namespace Ziming\LaravelDocparser;

use Illuminate\Support\Facades\Http;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ziming\LaravelDocparser\Commands\LaravelDocparserCommand;

class LaravelDocparserServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-docparser')
            ->hasConfigFile();
    }

    public function packageBooted(): void
    {
        Http::macro('docparser', function () {
            return Http::baseUrl(config('docparser.base_url'))
                ->withBasicAuth(config('docparser.api_key'), '');
        });
    }
}
