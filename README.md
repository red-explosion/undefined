# Undefined

[![Latest Version on Packagist](https://img.shields.io/packagist/v/red-explosion/undefined.svg?style=flat-square)](https://packagist.org/packages/red-explosion/undefined)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/red-explosion/undefined/tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/red-explosion/undefined/actions/workflows/tests.yaml?query=branch:main)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/red-explosion/undefined/coding-standards.yml?label=code%20style&style=flat-square)](https://github.com/red-explosion/undefined/actions/workflows/coding-standards.yml?query=branch:main)
[![Total Downloads](https://img.shields.io/packagist/dt/red-explosion/undefined.svg?style=flat-square)](https://packagist.org/packages/red-explosion/undefined)

Undefined for Laravel takes care of formatting exceptions and errors into nicely formatted JSON responses.

> Note: This package is still a Work in Progress and things may change.

## Installation

You can install the package via composer:

```bash
composer require red-explosion/undefined
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="undefined-config"
```

## Usage

In order to use Undefined, you need to replace your exception handler. Replace the following in your
`bootstrap/app.php` file:

```php
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);
```

with the following:

```php
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    RedExplosion\Undefined\ExceptionHandler::class
);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover a security vulnerability, please send an e-mail to Ben Sherred via ben@redexplosion.co.uk. All security
vulnerabilities will be promptly addressed.

## Credits

- [Ben Sherred](https://github.com/bensherred)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
