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
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

//Board
$router->get('/boards','BoardController@index');
$router->get('/boards/{id}', 'BoardController@find');
$router->post('/boards', 'BoardController@store');
$router->put('/boards/{id}', 'BoardController@update');
$router->delete('/boards/{id}', 'BoardController@delete');

//lists
$router->get('/boards{board}/list','ListController@index');
$router->get('/boards/{boards}/list', 'ListController@find');
$router->post('/boards/{boards}/list/{list}', 'ListController@store');
$router->put('/boards/{boards}/list/{list}', 'ListController@update');
$router->delete('/boards/{boards}/list/{list}', 'ListController@delete');


