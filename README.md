## Hướng dẫn cài đặt ứng dụng

Install/Update composer

- composer install --ignore-platform-reqs

- composer require cviebrock/eloquent-sluggable

Generate Key for app

- php artisan key:generate 

Generate Database

- php artisan migrate

Start up app
    
- php artisan serve

Setup file .env

- DB_DATABASE=laravel change to DB_DATABASE=shop_laravel

Start your apache, create database name shop_laravel and run command this code 

- php artisan migrate