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

Route::post('travel-packages/{titulo}_{dias}/checkout', [
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

Route::get('client/resgister', [
    'uses' => 'ClientController@index',
    'as' => 'client_register_path',
]);
Route::post('client/resgister', [
    'uses' => 'ClientController@store',
    'as' => 'new_client_store_path',
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

    Route::get('quotes/confirm', [
        'uses' => 'QuotesController@confirm',
        'as' => 'quotes_confirm_path',
    ]);

    Route::get('quotes/pending', [
        'uses' => 'QuotesController@pending',
        'as' => 'quotes_pending_path',
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


    Route::get('groups/{id}', [
        'uses' => 'ClienteCotizacionesController@index',
        'as' => 'group_path',
    ]);
    Route::post('groups/{id}', [
        'uses' => 'ClienteCotizacionesController@store',
        'as' => 'client_store_path',
    ]);
    Route::get('groups/client/{id}/edit', [
        'uses' => 'ClienteCotizacionesController@edit',
        'as' => 'client_edit_path',
    ]);

    Route::post('groups/client/{id}/edit', [
        'uses' => 'ClienteCotizacionesController@update',
        'as' => 'client_patch_path',
    ])->where('id', '[0-9]+');


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
//    Route::get('payments', [
//        'uses' => 'PagosController@index',
//        'as' => 'payments_path',
//    ]);
//
//    Route::get('payments/{id}', [
//        'uses' => 'PagosController@show',
//        'as' => 'payments_show_path',
//    ]);
//    Route::post('payments/{id}', [
//        'uses' => 'PagosController@store',
//        'as' => 'payments_store_path',
//    ]);
    Route::get('billing-history', [
        'uses' => 'PaymentController@index',
        'as' => 'history_path',
    ]);
//    Route::get('payments', [
//        'uses' => 'PaymentController@index',
//        'as' => 'payments_path',
//    ]);
    Route::get('payments/{id}', [
        'uses' => 'PaymentController@create',
        'as' => 'payments_create_path',
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
    Route::post('/nuevopaquete', [
        'uses' => 'PaqueteController@nuevo',
        'as' => 'pqt_nuevo_path',
    ]);

    Route::post('/buscar_itinerario',[
        'uses' => 'ItineraryController@buscar_itinerario',
        'as' => 'buscar_itinerario_path',
    ]);
    Route::post('/buscarpaquete', [
        'uses' => 'PaqueteController@buscar',
        'as' => 'pqt_buscar_path',
    ]);
    Route::post('/guardar_pre_cotizacion', [
        'uses' => 'CotizacionController@guardar_pre_cotizacion',
        'as' => 'cotizacion_guardar_pre_path',
    ]);
    Route::post('/guardar_plan_cotizacion', [
        'uses' => 'CotizacionController@guardar_plan_cotizacion',
        'as' => 'cotizacion_guardar_plan_path',
    ]);
    Route::get('/cotizaciones', [
        'uses' => 'AdminController@cotizaciones',
        'as' => 'cotizaciones_path',
    ]);
    Route::get('/cotizacion', [
        'uses' => 'CotizacionController@cotizacion',
        'as' => 'cotizacion_path',
    ]);
    Route::post('/enviar_plan', [
        'uses' => 'CotizacionController@enviar_plan_cotizacion',
        'as' => 'enviar_plan_path',
    ]);
    Route::get('/autocomplete', [
        'uses' => 'PaqueteController@autocomplete',
        'as' => 'autocomplete',
    ]);
    Route::post('/mostrar_ordenes', [
        'uses' => 'OrdenController@show',
        'as' => 'mostrar_ordennes',
    ]);

    Route::get('buscar-cliente', [
        'uses' => 'ClientController@autocompletedni',
        'as' => 'buscar_cliente_path',
    ]);
    Route::get('buscar-paquete', [
        'uses' => 'PaqueteController@autocompletecodigo',
        'as' => 'buscar_paquete_path',
    ]);

    Route::post('cotizacion-crear-plan', [
        'uses' => 'CotizacionController@guardar_cotizacion_paso1',
        'as' => 'cotizacion_crear_plan_path',
    ]);
    Route::post('cotizacion-crear-mas-propuestas', [
        'uses' => 'CotizacionController@guardar_cotizacion_pason',
        'as' => 'cotizacion_crear_plann_path',
    ]);
    Route::post('/cotizacion-crear-itinerario', [
        'uses' => 'CotizacionController@guardar_cotizacion_paso2',
        'as' => 'cotizacion_guardar_plan_path',
    ]);
    Route::post('/editar-cotizacion', [
        'uses' => 'CotizacionController@guardar_cotizacion_paso2_edit',
        'as' => 'cotizacion_editar_plan_path',
    ]);

    Route::post('/cotizacion-crear-plan1', [
        'uses' => 'PaqueteController@buscar_plan',
        'as' => 'cotizacion_buscar_plan_path',
    ]);
//    LOBO - ADMIN
    Route::get('admin/client', [
        'uses' => 'ClientController@client',
        'as' => 'admin_client_path',

    ]);
    Route::get('admin/packages', [
        'uses' => 'ClientController@package',
        'as' => 'admin_package_path',
    ]);
    Route::get('admin/itinerary', [
        'uses' => 'ClientController@itinerary',
        'as' => 'admin_itinerary_path',
    ]);

    Route::get('admin/itinerary/new', [
        'uses' => 'ItineraryNewController@index',
        'as' => 'admin_itinerary_new_path',
    ]);
    Route::get('/userimage/{filename}', [
        'uses' => 'ItineraryNewController@getItineraryImage',
        'as' => 'admin_itinerary_image_path'
    ]);
    Route::get('admin/itinerary/create', [
        'uses' => 'ItineraryNewController@create',
        'as' => 'admin_itinerary_create_path',
    ]);
    Route::patch('admin/itinerary/store', [
        'uses' => 'ItineraryNewController@store',
        'as' => 'admin_itinerary_store_path',
    ]);
    Route::get('admin/itinerary/edit/{id}', [
        'uses' => 'ItineraryNewController@edit',
        'as' => 'admin_itinerary_edit_path',
    ]);

    Route::post('admin/itinerary/edit/{id}', [
        'uses' => 'ItineraryNewController@update',
        'as' => 'admin_itinerary_update_path',
    ])->where('id', '[0-9]+');

    Route::delete('admin/itinerary/edit/{id}', [
        'uses' => 'ItineraryNewController@destroy',
        'as' => 'admin_itinerary_delete_path',
    ])->where('id', '[0-9]+');

    Route::any('admin/proposals/{id}', [
        'uses' => 'CotizacionController@proposals',
        'as' => 'admin_proposals_path',
    ]);

    Route::get('admin/current-packages', [
        'uses' => 'CotizacionController@current_packages',
        'as' => 'admin_current_packages_path',
    ]);


    Route::get('admin/pdf-proposal/{id}', [
        'uses' => 'CotizacionController@pdf_proposal',
        'as' => 'view_proposal_pdf_path',
    ]);

    Route::post('editar_paquete_cotizacion', [
        'uses' => 'PaqueteController@editar_pqt',
        'as' => 'editar_paquete_cotizacion_path',
    ]);
    Route::post('editar_destinos_cotizacion', [
        'uses' => 'PaqueteController@editar_destinos',
        'as' => 'editar_destinos_cotizacion_path',
    ]);

    Route::post('/editar_paquete_itinerario', [
        'uses' => 'PaqueteController@editar_itinerario',
        'as' => 'editar_paquete_itinerario_path',
    ]);
    Route::post('/editar_paquete_itinerario_obs', [
        'uses' => 'PaqueteController@editar_paquete_itinerario_obs',
        'as' => 'editar_paquete_itinerario_obs_path',
    ]);
    Route::post('/editar_paquete_itinerario_serv', [
        'uses' => 'PaqueteController@editar_paquete_itinerario_serv',
        'as' => 'editar_paquete_itinerario_serv_path',
    ]);
    Route::post('/guardar_itinerario_servicio', [
        'uses' => 'ItineraryController@guardar_itinerario_servicio',
        'as' => 'guardar_itinerario_servicio_path',
    ]);


    Route::post('/borrar_paquete_itinerario', [
        'uses' => 'ItineraryController@borrar_itinerario',
        'as' => 'borrar_paquete_itinerario_path',
    ]);
    Route::post('/borrar_orden_itinerario', [
        'uses' => 'ItineraryController@borrar_itinerario_orden',
        'as' => 'borrar_orden_itinerario_path',
    ]);
    Route::post('/proposals', [
        'uses' => 'PaqueteController@guardar_precios_proposal',
        'as' => 'paquete_proposals_path',
    ]);
    Route::post('agregar-itinerario', [
        'uses' => 'ItineraryController@agregar_itineraios',
        'as' => 'guardar_itinerario_path',
    ]);

    Route::patch('admin/proposals/{id}/posibilidad', [
        'uses' => 'CotizacionController@posibilidad',
        'as' => 'admin_posibilidad_path',
    ]);
    Route::post('registar-cliente', [
        'uses' => 'ClienteCotizacionesController@registrar_fast',
        'as' => 'registrar_cliente_fast_path',
    ]);
    Route::get('packages-current-list/', [
        'uses' => 'PaqueteController@index',
        'as' => 'current_list_path',
    ]);
    Route::get('nuevo-paquete', [
        'uses' => 'PaqueteController@nuevo_paquete',
        'as' => 'nuevo_paquete_path',
    ]);
    Route::post('nuevo-paquete', [
        'uses' => 'CotizacionController@guardar_nuevo_paquete',
        'as' => 'guardar_nuevo_paquete_path',
    ]);
    Route::post('paquete-agregar-itinerario', [
        'uses' => 'ItineraryController@paquete_agregar_itineraios',
        'as' => 'paquete_guardar_itinerario_path',
    ]);
    Route::post('editar_paquete', [
        'uses' => 'PaqueteController@editar_pqt_nuevo',
        'as' => 'editar_paquete_path',
    ]);
    Route::post('editar_destinos_paquete', [
        'uses' => 'PaqueteController@editar_destinos_paquete',
        'as' => 'editar_destinos_paquete_path',
    ]);
    Route::post('/editar_paquete_nuevo_itinerario', [
        'uses' => 'PaqueteController@editar_nuevo_itinerario',
        'as' => 'editar_paquete_nuevo_itinerario_path',
    ]);
    Route::post('/borrar_paquete_nuevo_itinerario', [
        'uses' => 'ItineraryController@borrar_pitinerario',
        'as' => 'borrar_paquete_nuevo_itinerario_path',
    ]);
    Route::post('/editar_nuevo_paquete_itinerario_obs', [
        'uses' => 'PaqueteController@editar_nuevo_paquete_itinerario_obs',
        'as' => 'editar_nuevo_paquete_itinerario_obs_path',
    ]);
    Route::post('/guardar_itinerario_servicio_nuevo', [
        'uses' => 'ItineraryController@guardar_itinerario_servicio_nuevo',
        'as' => 'guardar_itinerario_servicio_nuevo_path',
    ]);
    Route::post('paquete-terminado', [
        'uses' => 'PaqueteController@guardar_precios_paquete',
        'as' => 'guardar_paquete_path',
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
