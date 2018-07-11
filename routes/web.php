<?php

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



//authentication User
$router->post('/register', 'AuthController@register');



$router->get('/boards', 'BoardController@index');
$router->get('/boards/{id}', 'BoardController@find');
$router->post('/boards', 'BoardController@store');
$router->put('/boards/{id}', 'BoardController@update');
$router->delete('/boards/{id}', 'BoardController@delete');

