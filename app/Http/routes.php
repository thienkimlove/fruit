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

use Illuminate\Support\Facades\App;

Route::get('/', 'FrontendController@index');

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

Route::get('/{value}', function ($value) {
    if (preg_match('/([a-z0-9\-]+)\.html/', $value, $matches)) {
        return App::make('App\Http\Controllers\FrontendController')->details($matches[1]);
    } else {
        return App::make('App\Http\Controllers\FrontendController')->category($value);
    }
});