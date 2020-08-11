## Installation
1. Clone this repository
2. Run `composer install`
3. Run `cp .env.example .env` and then edit the `.env` file with correct params
4. Run `php artisan key:generate`
5. Run `php artisan migrate:fresh -seed`
6. Setup virtual host or anyway you want to access the laravel project
7. Checkout in browser

## Running tests
Run `vendor/bin/phpunit tests`
