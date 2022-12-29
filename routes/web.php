<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/



    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->get('/product','ProductController@getAllProduct');
    $router->get('/product/{id}','ProductController@getSingleProduct');
    $router->get('/product/nama/{name}','ProductController@getProductByName');
    $router->post('/input/products', 'ProductController@store');

    $router->get('/api', ['uses' => 'ProductController@getAllProduct', 'middleware' => 'cors']);

