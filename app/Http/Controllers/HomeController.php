<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\Cotizacion;
use GotoPeru\ItinerarioPersonalizado;
use GotoPeru\ItinerarioXHora;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\TPaquete;
use Illuminate\Http\Request;

use GotoPeru\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes')->get()->where('estado', 1);
        $featured = TPaquete::with('paquetes_destinos', 'precio_paquetes')->get()->where('estadoslider', 1);
//        dd($paquete);
        return view('home', ['paquete'=>$paquete, 'featured'=>$featured]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdate($titulo, $dias)
    {

//        if ($_POST){
//            Session::put('s_date', Input::get('txt_date'));
//            Session::put('s_country', Input::get('txt_country'));
//        }

        $title = str_replace('-', ' ', $titulo);
        $paquete = TPaquete::with('itinerario','paquetes_destinos', 'precio_paquetes')->get()->where('titulo', $title);
//        dd($paquete);

        return view('travel-package', ['paquetes'=>$paquete]);
    }

    public function showcheckout($titulo)
    {
        $title = str_replace('-', ' ', $titulo);
        $paquete = TPaquete::with('itinerario','paquetes_destinos', 'precio_paquetes')->get()->where('titulo', $title);
//        dd($paquete);

        return view('checkout', ['paquetes'=>$paquete]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function guardarUsuario()
    {
        $user = Cotizacion::create(['nropersonas' => '10']);

        $user->save();

        return $user;
    }
}
