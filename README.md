# Login Temperatures
### Package
- Laravel 8.x
- Laravel Breeze
- Vue 3.x
- tailwindcss 3.x

### Requirement

* PHP 7.3.x +
* MySQL Database
* Composer 2.0.x +
* Node.js 14.16.x +

## Installation

Clone the repository

    git clone https://github.com/reshanmadushanka/login_temperature.git

Switch to the repo folder

    cd login_temperature

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Set env Variable For Open weather

    OPEN_WEATHER_API_KEY=

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

From root project directory, run the following commands

    composer install
    npm install
    npm run watch
    php artisan serve

Run in your browser

    http://127.0.0.1:8000

Register account and login



