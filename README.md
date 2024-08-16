<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Project Setup

1. Clone project via SSH `git@github.com:MaryKal/test-shop.git`
2. Run `composer install`
3. Run `./vendor/bin/sail up`
4. Run `php artisan project:setup`
5. Copy access token from console

> Access token available only once. If you want to obtain another token, run `php artisan project:setup` again (all
> database data will be wiped!), or use api/login route (description below)

# Routes

> ### Base URL: `http://127.0.0.1:8000/api`
>  Note: Each request should have `Accept: application/json` header
>
>  Note: Each auth request should have `Authorization: Bearer <token>` header

## Login

Endpoint: `http://127.0.0.1/api/login`

Method: `POST`

Body:

    email: test@example.com
    password: password

## Get all products

Endpoint: `http://127.0.0.1/api/products`

Method: `GET`

## Get current user basket

Endpoint: `http://127.0.0.1/api/baskets`

Method: `GET`

## Add product to basket

Endpoint: `http://127.0.0.1/api/basket-products`

Method: `POST`

Body:

    code: B01

## Remove product from basket

Endpoint: `http://127.0.0.1/api/basket-products/{basket_product_id}`

Method: `DELETE`
