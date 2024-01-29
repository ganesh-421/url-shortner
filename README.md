# Laravel URL Shortener

## Overview
This Laravel project is a simple URL shortener that allows users to shorten long URLs into more manageable and shareable links.

## Features
- Shorten long URLs
- Track the number of clicks on shortened URLs
- User authentication and authorization
- Admin panel for managing shortened URLs and users

## Requirements
- PHP 8.2^
- Laravel 10.4^
- MySQL or any other database supported by Laravel

## Installation
1. Clone the repository:
   ```bash
   git clone git@github.com:ganesh-421/url-shortner.git
    ```
2. Update Composer:
    ```bash
    composer update
    ```
3. Generate application key
   ```bash
    php artisan key:generate
   ```

4. Setup Database connection
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=url-shortner
    DB_USERNAME=your db username
    DB_PASSWORD=your db pasword
   ```
5. Run application
   ```bash
   php artisan serve
   ```
6. Run NPM
   ```bash
   npm run dev
   ```
   
