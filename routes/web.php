<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home_path',
]);

Route::get('login', [
    'uses' => 'LoginController@index',
    'as' => 'Login_path',
]);

Route::get('quotes', [
    'uses' => 'QuotesController@index',
    'as' => 'quotes_path',
]);

Route::get('quotes/{id}', [
    'uses' => 'QuotesController@show',
    'as' => 'quotes_show_path',
]);

Route::get('/profile', [
    'uses' => 'ProfileController@index',
    'as' => 'profile_path',
]);

Route::get('itinerary/{id}', [
    'uses' => 'ItineraryController@show',
    'as' => 'packages_path',
]);

Route::get('users', [
    'uses' => 'HomeController@guardarUsuario',
    'as' => 'users_create_path',
]);