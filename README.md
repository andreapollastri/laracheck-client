# Laracheck Client
Laravel Package for Laracheck

## Installation

- Install client vendor:
```shell
composer require andreapollastri/laracheck
```

- Update application bootstrap file:
```php
// bootstrap/app.php
return Application::configure(basePath: dirname(__DIR__))
    //
    ->withExceptions(function (Exceptions $exceptions) {
        \Andr3a\Laracheck\Laracheck::track($exceptions);
    })->create();
```

- Add these vars into your .env file:
```
LARACHECK_API_KEY=<YOUR-LARACHECK-API-KEY>
LARACHECK_SITE_ID=<YOUR-LARACHECK-SITE-ID>
LARACHECK_ENDPOINT=<YOUR-LARACHECK-API-URL>
```
