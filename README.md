<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# <p align="center">IZIX TEST APPLICATION</p>

# Getting started

This application is intended to demonstrate **Domain Driven Design** & **Hexagonal architecture**

## Installation

Clone the repository

    git clone git@github.com:nyagoalex/izix-app.git

Switch to the repo folder

    cd izix-app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations & seeders (**Set the database connection in .env before migrating**)

    php artisan migrate --seed
    
Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:nyagoalex/izix-app.git
    cd izix-app
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate --seed
    php artisan serve

The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

## API Specification

### ======= Admin =========
Article API

    GET /api/admin/articles?include=comments&filter[has_comments]=only
    GET /api/admin/articles/{article_id}
    POST /api/admin/articles
    PACTH /api/admin/articles/{article_id}
    DELETE /api/admin/articles/{article_id}

Report API

    GET /api/admin/report

### ======= Visitor =========
Article API

    GET /api/articles?include=comments&filter[has_comments]=only
    GET /api/articles/{article_id}

Comment API

    GET /api/articles/{article_id}/comments
    GET /api/articles/{article_id}/comments/{comment_id}
    POST /api/articles/{article_id}/comments
    PACTH /api/articles/{article_id}/comments/{comment_id}
    POST /api/articles/{article_id}/comments/{comment_id}/publish

----------
## Testing APIs
Application follows test driven design as well, run the following command to test the api

    composer test

Thank you for considering my work
