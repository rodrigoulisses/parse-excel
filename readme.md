# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

## Setup

- Install composer
https://getcomposer.org/

- Download composer dependencies

    `composer install`

- Configure database
    - Copy the .env.example file to .env and configure your environment variables
        - APP_URL
        - DB_* variables

- Create tables

    `php artisan migrate:refresh`

## Architecture
This project uses the default Laravel architecture. For more information, please check the [laravel website](https://laravel.com).

## Running Application
- Serve
    `php artisan serve`
  If you use docker run the command:
    `php artisan serve --host=0.0.0.0`

## Running Tests
- Refresh database (recommended)
    `php artisan migrate:refresh --seed`

- Run PHPUnit
    `vendor/bin/phpunit`

## Useful links
- Laravel: https://laravel.com
