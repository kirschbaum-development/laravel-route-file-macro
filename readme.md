# Laravel Route File Macro

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kirschbaum-development/laravel-route-file-macro.svg?style=flat-square)](https://packagist.org/packages/kirschbaum-development/laravel-route-file-macro)
[![Total Downloads](https://img.shields.io/packagist/dt/kirschbaum-development/laravel-route-file-macro.svg?style=flat-square)](https://packagist.org/packages/kirschbaum-development/laravel-route-file-macro)

This package allows you to load a routes file directly from the Laravel `Router`.

## Requirements

This package requires Laravel 5.7 or higher.

## Installation

You can install this macro via composer:

```bash
composer require kirschbaum-development/laravel-route-file-macro
```

## Usage

```php
Route::file(base_path('routes/admin/users.php'));
```

### Array Usage

```php
Route::file([
base_path('routes/admin/posts.php'),
base_path('routes/admin/users.php')
]);
```

### `SplFileInfo` Usage

```php
$files = File::files(__DIR__.'/routes');
Route::file($files);
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email david@kirschbaumdevelopment.com or nathan@kirschbaumdevelopment.com instead of using the issue tracker.

## Credits

- [David VanScott](https://github.com/dvanscott)
- [Justin Seliga](https://github.com/jrseliga)

## Sponsorship

Development of this package is sponsored by Kirschbaum Development Group, a developer driven company focused on problem solving, team building, and community. Learn more [about us](https://kirschbaumdevelopment.com) or [join us](https://careers.kirschbaumdevelopment.com)!

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.