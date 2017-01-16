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

Route::any('packages/{titulo}_{dias}', [
    'uses' => 'HomeController@showpackages',
    'as' => 'home_show_travel_path',
]);


Route::get('travel-packages-all-included/{dias}-days', [
    'uses' => 'HomeController@showdate',
    'as' => 'home_show_date_path',
]);

Route::get('inquire', [
    'uses' => 'HomeController@inquire',
    'as' => 'home_inquire_path',
]);
Route::get('availability', [
    'uses' => 'HomeController@availability',
    'as' => 'home_availability_path',
]);
Route::get('design', [
    'uses' => 'HomeController@design',
    'as' => 'home_design_path',
]);

//Route::any('travel-packages/{titulo}_{dias}', [
//    'uses' => 'HomeController@showdate',
//    'as' => 'home_show_date_path',
//]);

Route::any('travel-packages/', [
    'uses' => 'HomeController@viewpackages',
    'as' => 'home_show_packages_path',
]);

Route::any('travel-packages/{titulo}_{dias}/checkout', [
    'uses' => 'HomeController@showcheckout',
    'as' => 'home_show_checkout_path',
]);

Route::get('travel-packages/{dias}-days', [
    'uses' => 'HomeController@showdays',
    'as' => 'home_show_days_path',
]);

Route::get('travel-packages/{category}', [
    'uses' => 'HomeController@showcategory',
    'as' => 'home_show_category_path',
]);

Route::post('checkout-package/{titulo}_{dias}', [
    'uses' => 'HomeController@checkout',
    'as' => 'checkout_package_path',
]);

Route::post('checkout/', [
    'uses' => 'CheckoutController@store',
    'as' => 'checkout_store_path',
]);
Route::post('checkout-confirmation/', [
    'uses' => 'CheckoutController@confirmation',
    'as' => 'noti-reservation-client',
]);
Route::any('pay-confirmation/',[
    'uses' => 'CheckoutController@pay_confirmation',
    'as' => 'noti-pay-confirmation-client',
]);
Route::post('checkout-confirmation-empresa/', [
    'uses' => 'CheckoutController@pay_confirmation_empresa',
    'as' => 'noti-reservation-empresa',
]);
Route::post('/buscardisponibilidad', [
    'uses' => 'CheckoutController@buscar_disponibilidad',
    'as' => 'pqt_buscar_disponibilidad_path',
]);
Route::post('/buscarstate', [
    'uses' => 'CheckoutController@buscar_state',
    'as' => 'pqt_buscar_state_path',
]);
Route::post('/buscarcity', [
    'uses' => 'CheckoutController@buscar_city',
    'as' => 'pqt_buscar_city_path',
]);
Route::post('/buscarotradisponibilidad', [
    'uses' => 'CheckoutController@buscar_otra_disponibilidad',
    'as' => 'pqt_buscar_otra_disponibilidad_path',
]);
Route::any('travel-packages/{titulo}_{dias}/checkout1', [
    'uses' => 'HomeController@showcheckout1',
    'as' => 'home_show_checkout_path1',
]);
Route::post('pdf/{id}', [
    'uses' => 'HomeController@pdf',
    'as' => 'view_vacations_pdf_path',
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
    Route::post('/guardar_pre_cotizacion', [
        'uses' => 'CotizacionController@guardar_pre_cotizacion',
        'as' => 'cotizacion_guardar_pre_path',
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