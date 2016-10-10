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
