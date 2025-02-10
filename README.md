# Laravel package for Docparser

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ziming/laravel-docparser.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-docparser)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-docparser/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ziming/laravel-docparser/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-docparser/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ziming/laravel-docparser/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ziming/laravel-docparser.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-docparser)

Laravel Package for [Docparser](https://docparser.com/?ref=iavng). A user friendly document parser SaaS.



## Support us

You can support me by becoming a customer of Docparser through my referral link: 

[Docparser](https://docparser.com/?ref=iavng)

## Installation

You can install the package via composer:

```bash
composer require ziming/laravel-docparser
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-docparser-config"
```

This is the contents of the published config file:

```php
return [
    'base_url' => env('DOCPARSER_BASE_URL', 'https://api.docparser.com/'),
    'api_key' => env('DOCPARSER_API_KEY'),
];
```

## Usage

```php
$docparser = new Ziming\LaravelDocparser::make();
echo $docparser->fetchDocumentFromUrl($parserId, $url);
```

```php

// Alternatively, you can use the facade
use Ziming\LaravelDocparser\Facades\LaravelDocparser;
LaravelDocparser::fetchDocumentFromUrl($parserId, $url);
```

Look at the source code of `src/LaravelDocparser.php` for more methods (link below):

[LaravelDocparser.php](https://github.com/ziming/laravel-docparser/blob/main/src/LaravelDocparser.php)

To learn more about what each method does in more detail, please refer to the [Docparser API documentation](https://docparser.com/api/?iavng).

## Other Resources to Get Started
To learn more about Docparser, I recommend the following resources:

- [Docparser Features](https://docparser.com/features?ref=iavng)
- [Docparser Pricing](https://docparser.com/pricing?ref=iavng)
- [Docparser Blog on Extracting Data from PDF](https://docparser.com/blog/extract-data-from-pdf/?ref=iavng)
- [Docparser Blog on Zonal OCR](https://docparser.com/blog/zonal-ocr/?ref=iavng)

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ziming](https://github.com/ziming)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
