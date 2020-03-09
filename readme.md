# Laravel Route File Macro

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kirschbaum-development/laravel-route-file-macro.svg?style=flat-square)](https://packagist.org/packages/kirschbaum-development/laravel-route-file-macro)
[![Total Downloads](https://img.shields.io/packagist/dt/kirschbaum-development/laravel-route-file-macro.svg?style=flat-square)](https://packagist.org/packages/kirschbaum-development/laravel-route-file-macro)

This package allows you to load a routes file directly from the Laravel `Router`.

## Requirements

This package requires Laravel 5.7 or higher.

__Due to Laravel 7.x's increased PHP version requirement, if you need support for PHP 7.1, please use version 0.2 of the package.__

## Installation

You can install this macro via composer:

```bash
composer require kirschbaum-development/laravel-route-file-macro
```

## Usage

### Single Item

`Route::file` accepts a single file path or `SplFileInfo` object and cannot be used with multiple paths or file objects.

```php
Route::file(base_path('routes/admin/users.php'));

$files = File::files(__DIR__.'/routes');
Route::files($files[0]);
```

### Multiple Items

`Route::files` accepts an array of file paths or an array of `SplFileInfo` objects and cannot be used with a single path or file object.

```php
Route::files([
    base_path('routes/admin/posts.php'),
    base_path('routes/admin/users.php')
]);

$files = File::files(__DIR__.'/routes');
Route::files($files);
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