# Spinola-test

This project was generated with (https://laravel.com/docs/10.x)

## Development server

Have the latest version of Docker installed 

## App code

Clone the project from the following path (https://github.com/DannCoco/spinola-test.git). Run git checkout -b master and after run git pull origin master

## Running backend application

Run docker compose up -d --build to build docker images.
Run docker exec -it php bash to access the project

## Laravel configuration

Run cp .env.example .env to create .env file
Run composer install to install dependencies
Run php artisan key:generate command to generate this variable's value

## Running tests unit

Run composer tests:local