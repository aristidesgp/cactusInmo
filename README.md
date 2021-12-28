CactusInmo

Real estate management application made with Laravel 8, LiveWire, MySQL & React JS

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Additionally you need to install [Node.js.](https://nodejs.org/es/download/)

Clone the repository

https://github.com/aristidesgp/cactusInmo

Switch to the repo folder

    cd cactusInmo

Install all the dependencies using composer

    composer install
    
Install all the dependencies using npm

    npm install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Important: Include this configuration in the file .env

    API_URL=https://api.whise.eu
    TOKEN=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImlhdCI6MTYzODgxNzM3MH0.eyJzZXJ2aWNlQ29uc3VtZXJJZCI6MTg3LCJ0eXBlSWQiOjcsImNsaWVudElkIjoyNTkwLCJvZmZpY2VJZCI6NDM2OH0.wqcbLPs4I0YAa0HN4rxiV5S0waqx7SI2_Ckv_CwubJo
    

Database configuration.

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=cactusinmo_db
    DB_USERNAME=root
    DB_PASSWORD=

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
