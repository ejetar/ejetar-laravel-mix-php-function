# Laravel Mix PHP Function

## About
A lightweight and simple library that adds Laravel Mix's mix() function to your PHP project 🚀

You can now use the mix() function of Laravel Mix independently, without needing Laravel and/or Blade and/or Vue...

## Installation
`composer require ejetar/laravel-mix-php-function`

## Get started
1. Load the composer into your project;
2. Call mix() at the desired location;
3. And that's it, that's all, have fun!

### Example
Let's say we have the following `mix-manifest.json`, in the **public folder** of our project:
```json
{
    "/css/all.css": "/css/all.css?id=2fcc406cf38a7867b239",
    "/css/all.min.css": "/css/all.min.css?id=2fcc406cf38a7867b239", 
    "/js/all.js": "/js/all.js?id=2c80a6c15449d3e693ed", 
    "/js/all.min.js": "/js/all.min.js?id=2c80a6c15449d3e693ed"
}
```

Now suppose I want to retrieve the versioned URL from the _/css/all.min.css_ file:
```php
<?php require_once 'vendor/autoload.php'; //Load Composer ?><!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Example</title>
        
        <link rel="stylesheet" href="<?= mix('/css/all.min.css'); ?>">
        <!-- The result will be /css/all.min.css?id=2fcc406cf38a7867b239 -->
    </head>
    <body>
        <h1>\o/</h1>
    </body>
</html>
```

That simple!

## Custom Mix Base URLs
You can also use custom mix base URLs, just as you would with Laravel.

Just define the constant `MIX_ASSET_URL` before using the mix function.

### Example
```php
<?php
require_once 'vendor/autoload.php'; //Load Composer
define('MIX_ASSET_URL', 'https://cdn.example.com');
?><!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Example</title>
        
        <link rel="stylesheet" href="<?= mix('/css/all.min.css'); ?>">
        <!-- The result will be https://cdn.example.com/css/all.min.css?id=2fcc406cf38a7867b239 -->
    </head>
    <body>
        <h1>\o/</h1>
    </body>
</html>
```

## Changelog
Nothing for now...

## Contributing
Contribute to this wonderful project, it will be a pleasure to have you with us. Let's help the free software community. You are invited to incorporate new features, make corrections, report bugs, and any other form of support.
Don't forget to star in this repository! 😀

## License
This library is a open-source software licensed under the MIT license.
