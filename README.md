# Undefined

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/red-explpsion/undefined.svg?style=flat-square)](https://packagist.org/packages/red-explpsion/undefined)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/red-explpsion/undefined/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/red-explpsion/undefined/actions/workflows/tests.yaml?query=branch:main)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/red-explpsion/undefined/coding-standards.yml?label=code%20style&style=flat-square)](https://github.com/red-explpsion/undefined/actions/workflows/coding-standards.yml?query=branch:main)
[![Total Downloads](https://img.shields.io/packagist/dt/red-explpsion/undefined.svg?style=flat-square)](https://packagist.org/packages/red-explpsion/undefined)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require red-explpsion/undefined
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="undefined-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="undefined-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="undefined-views"
```

## Usage

```php
$variable = new RedExplosion\Undefined();
echo $variable->echoPhrase('Hello, RedExplosion!');
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
