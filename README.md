# This is my package here-laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tomykho/here-laravel.svg?style=flat-square)](https://packagist.org/packages/tomykho/here-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/tomykho/here-laravel/run-tests?label=tests)](https://github.com/tomykho/here-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/tomykho/here-laravel/Check%20&%20fix%20styling?label=code%20style)](https://github.com/tomykho/here-laravel/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tomykho/here-laravel.svg?style=flat-square)](https://packagist.org/packages/tomykho/here-laravel)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/here-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/here-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require tomykho/here-laravel
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="here-laravel-config"
```

This is the contents of the published config file:

```php
return [

    /*
    |-----------------------------------------------------------------------
    | API Key
    |-----------------------------------------------------------------------
    |
    | Specify API Key provided by Here.
    |
    */
    'api_key' => env('HERE_API_KEY'),

    'cache' => [
        /*
        |-----------------------------------------------------------------------
        | Cache Connection
        |-----------------------------------------------------------------------
        |
        | Specify the cache database connection to use for caching.
        |
        | Default: null
        |
        */
        'connection' => null,

        /*
        |-----------------------------------------------------------------------
        | Cache Duration
        |-----------------------------------------------------------------------
        |
        | Specify the cache duration in seconds.
        |
        | Default: 1 day (string)
        |
        */
        'duration' => '1 year',
    ],
];
```

## Usage

```php
$query = new GeocodeQuery(postalCode: '218696', country: 'Singapore');
$items = Here::geocode($query);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Tomy Kho](https://github.com/tomykho)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
