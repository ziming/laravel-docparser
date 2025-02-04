<?php

declare(strict_types=1);

use Ziming\LaravelDocparser\LaravelDocparser;

test('ping docparser', function () {

    $docparser = LaravelDocparser::make();

    $response = $docparser->ping();

    expect($response->json('error'))
        ->toBe('no API key found');
});
