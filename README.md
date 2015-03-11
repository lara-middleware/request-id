# request-id

[![Packagist version][packagist-image]][packagist-url]
[![Build Status][travis-image]][travis-url]

> Set `X-Response-Time` to response header

## Install

```sh
$ composer require lara-middleware/request-id
```

or add

`"lara-middleware/response-time": "dev-master"`

to `package.json` > `"require"`

## Usage

#### For all routes

Add `'LaraMiddleware\RequestId\RequestId'` as Kernel's first middleware:

```php
// app/Http/Kernel.php
protected $middleware = [
	'LaraMiddleware\RequestId\RequestId',
	....
]
```

#### For specific routes

Add `'response-time' => 'LaraMiddleware\RequestId\RequestId',` to route middleware:

```php
// app/Http/Kernel.php
protected $routeMiddleware = [
	'response-time' => 'LaraMiddleware\RequestId\RequestId',
	....
]
```

Then, use with routes:

```php
Route::get('some-specific', ['middleware' => 'request-id', function()
{
    //
}]);
```

## License
MIT © [C. T. Lin](https://github.com/chentsulin)

[packagist-image]: https://img.shields.io/packagist/v/lara-middleware/request-id.svg?style=flat-square
[packagist-url]: https://packagist.org/packages/lara-middleware/request-id
[travis-image]: https://travis-ci.org/lara-middleware/request-id.svg
[travis-url]: https://travis-ci.org/lara-middleware/request-id
