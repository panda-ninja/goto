<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\Cotizacion;
use GotoPeru\ItinerarioCotizacion;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\TDestino;
use GotoPeru\TPaqueteDestino;
use GotoPeru\TPrecioPaquete;
use Illuminate\Http\Request;

use GotoPeru\Http\Requests;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $idCliente=auth()->guard('cliente')->user()->id;
        $cotizaciones = Cotizacion::with('paquete_cotizaciones.precio_paquetes','paquete_cotizaciones.paquetes_destinos')->get()
            ->where('clientes_id',$idCliente)
            ->sortByDesc('fecha');

//        $destinos = Cotizacion::with('paquete_cotizaciones.paquetes_destinos.destinos')->get();

//        $destinos = TDestino::with('paquetes_destinos')->get();
        //return $destinos;
//        dd($cotizaciones);
        return view('quotes', ['cotizaciones'=>$cotizaciones]);


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
    public function show($id)
    {
//        $cotizacion = Cotizacion::findOrFail($id);
//        $paquete = PaqueteCotizacion::findOrFail($id);
//        $itinerarios = ItinerarioCotizacion::with(['horas_cotizaciones'=>function($horas){$horas->orderBy('hora','asc'); }, 'servicios_cotizaciones'])->get()->where('paquete_cotizaciones_id', $paquete->id)->sortBy('dias');

        $paquete = PaqueteCotizacion::with('precio_paquetes','paquetes_destinos','itinerario_cotizaciones.horas_cotizaciones', 'itinerario_cotizaciones.servicios_cotizaciones')->get()->where('id', $id);
        //$paquete1 =$paquete->itinerario_cotizaciones->dias;
//        dd($paquete);
//        $itinerarios = ItinerarioCotizacion::with('paquetes_cotizaciones')->get()->where('paquete_cotizaciones_id', $paquete->id)->sortBy('dias');

        return view('itinerary_quotes', ['paquete'=>$paquete]);
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
}
