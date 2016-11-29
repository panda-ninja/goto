<?php

namespace GotoPeru\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use GotoPeru\Cotizacion;
use GotoPeru\ItinerarioCotizacion;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\TDestino;
use GotoPeru\TPaqueteDestino;
use GotoPeru\TPrecioPaquete;
use Illuminate\Http\Request;

use GotoPeru\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
        //dd($cotizaciones);
        return view('quotes', ['cotizaciones'=>$cotizaciones]);
    }

    public function proposals()
    {

        $idCliente=auth()->guard('cliente')->user()->id;
        $cotizaciones = Cotizacion::with('paquete_cotizaciones.precio_paquetes','paquete_cotizaciones.paquetes_destinos')->get()
            ->where('clientes_id',$idCliente)
            ->take(1);

        return view('proposals', ['cotizaciones'=>$cotizaciones]);
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
        $idCliente=auth()->guard('cliente')->user()->id;
        $cotizaciones = Cotizacion::with('paquete_cotizaciones.precio_paquetes','paquete_cotizaciones.paquetes_destinos')->get()
            ->where('clientes_id',$idCliente)
            ->sortByDesc('fecha');

        $paquete = PaqueteCotizacion::with('precio_paquetes','paquetes_destinos','itinerario_cotizaciones.horas_cotizaciones', 'itinerario_cotizaciones.servicios_cotizaciones')->get()->where('id', $id);

        if ($paquete->count()>0){
           return view('itinerary_quotes', ['paquetes'=>$paquete, 'cotizaciones'=>$cotizaciones]);
//            dd($paquete);
        }
        else{
            return redirect::to(route('503_path'));

        }
    }
    public function show1()
    {
        return view('errors.503');
    }


    public function pdf($id)
    {

        $paquete = PaqueteCotizacion::with('precio_paquetes','paquetes_destinos','itinerario_cotizaciones.horas_cotizaciones', 'itinerario_cotizaciones.servicios_cotizaciones')->get()->where('id', $id);
        $pdf = \PDF::loadView('quotes_pdf', ['paquete'=>$paquete])->setPaper('a4')->setWarnings(true);
        return $pdf->download('itinerary_'.$id.'.pdf');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \illuminate\Http\Response
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
        $paquete = PaqueteCotizacion::findOrFail($id);
        $paquete->estado = '1';
        $paquete->save();

        $cotizacion = Cotizacion::findOrFail($paquete->cotizaciones_id);
        $cotizacion->estado = '3';
        $cotizacion->save();

        return redirect()->route('quotes_show_path', $paquete->id)->with('success','Paquete confirmado');
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
