<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

#Admin

Route::get('/admin', [
    'uses' => 'AdminController@index',
    'middleware' => ['auth', 'admin']
]);

Route::group(['middleware' => ['auth','admin']], function($router)
{
    $router->resource('categories', 'CategoriesController');
    $router->resource('posts', 'PostsController');
    $router->resource('settings', 'SettingsController');
});


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);