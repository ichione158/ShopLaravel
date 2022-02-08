## Hướng dẫn cài đặt ứng dụng

Install/Update composer

- composer install --ignore-platform-reqs

- composer require cviebrock/eloquent-sluggable

Generate Key for app

- php artisan key:generate 

Setup file .env, setup Database

- DB_DATABASE=laravel change to DB_DATABASE=shop_laravel

Start your apache, create database name shop_laravel and run command this code 

- php artisan migrate OR php artisan migrate:fresh
- php artisan db:seed

Start up app
    
- php artisan serve