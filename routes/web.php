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

/*==begin== rutas para clientes ================================================================*/
Route::get('cliente/login', [
    'uses' => 'ClientAuthController@index',
    'as' => 'client_auth_index_path',
]);
Route::post('cliente/login', [
    'uses' => 'ClientAuthController@store',
    'as' => 'client_auth_store_path',
]);
Route::get('cliente/logout', [
    'uses' => 'ClientAuthController@destroy',
    'as' => 'client_auth_destroy_path',
]);
Route::group(['middleware'=>'cliente'],function(){
    Route::get('quotes', [
        'uses' => 'QuotesController@index',
        'as' => 'quotes_path',
    ]);

    Route::patch('quotes/{id}', [
        'uses' => 'QuotesController@update',
        'as' => 'quotes_patch_path',
    ])->where('id', '[0-9]+');

    Route::get('quotes/{id}/pdf', [
        'uses' => 'QuotesController@pdf',
        'as' => 'quotes_pdf_path',
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
});
/*==end== rutas para clientes ====================================================================*/


/*
Route::get('login', [
    'uses' => 'LoginController@index',
    'as' => 'Login_path',
]);
*/

/*Route::get('users', [
    'uses' => 'HomeController@guardarUsuario',
    'as' => 'users_create_path',
]);*/