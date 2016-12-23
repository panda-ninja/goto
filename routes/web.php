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
use Illuminate\Http\Request;
use Illuminate\Http\Response;

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home_path',
]);

Route::any('travel-package/{titulo}_{dias}', [
    'uses' => 'HomeController@show',
    'as' => 'home_show_path',
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
    Route::get('notification/{id}', [
        'uses' => 'PagosController@send',
        'as' => 'payments_noti_path',
    ]);

    Route::get('503', [
        'uses' => 'QuotesController@show1',
        'as' => '503_path',
    ]);

    Route::get('quotes', [
        'uses' => 'QuotesController@index',
        'as' => 'quotes_path',
    ]);

    Route::get('proposals', [
        'uses' => 'QuotesController@proposals',
        'as' => 'proposals_path',
    ]);


    Route::patch('quotes/{id}', [
        'uses' => 'QuotesController@update',
        'as' => 'quotes_patch_path',
    ])->where('id', '[0-9]+');

    Route::get('quotes/{id}/pdf', [
        'uses' => 'QuotesController@pdf',
        'as' => 'quotes_pdf_path',
    ]);


//    Route::post('quotes/{id}', [
//        'uses' => 'QuotesController@show',
//        'as' => 'quotes_show_path',
//    ]);

    Route::get('quotes/{id}', [
        'uses' => 'QuotesController@show',
        'as' => 'quotes_show_path',
    ]);

    Route::get('itinerary/{id}', [
        'uses' => 'ItineraryController@show',
        'as' => 'packages_path',
    ]);

    /*-- payments*/
    Route::get('payments', [
        'uses' => 'PagosController@index',
        'as' => 'payments_path',
    ]);

    Route::get('payments/{id}', [
        'uses' => 'PagosController@show',
        'as' => 'payments_show_path',
    ]);
    Route::post('payments/{id}', [
        'uses' => 'PagosController@store',
        'as' => 'payments_store_path',
    ]);



});
/*==end== rutas para clientes ====================================================================*/
/*==end== rutas para el administrador ============================================================*/

Route::get('admin', [
    'uses' => 'AdminAuthController@index',
    'as' => 'admin_auth_index_path',
]);
Route::post('admin', [
    'uses' => 'AdminAuthController@store',
    'as' => 'admin_auth_store_path',
]);
Route::get('admin/logout', [
    'uses' => 'AdminAuthController@destroy',
    'as' => 'admin_auth_destroy_path',
]);
Route::group(['middleware'=>'admin'],function(){

    Route::get('/dashboard', [
        'uses' => 'CotizacionController@index',
        'as' => 'inicio_path',
    ]);
    Route::get('/cotizacion', [
        'uses' => 'CotizacionController@nuevacotizacion',
        'as' => 'cotizacion_path',
    ]);
    Route::post('/buscarpaquete', [
        'uses' => 'PaqueteController@buscar',
        'as' => 'pqt_buscar_path',
    ]);
});
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