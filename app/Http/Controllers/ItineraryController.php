<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\ItinerarioCotizacion;
use GotoPeru\ItinerarioOrden;
use GotoPeru\ItinerarioPersonalizado;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\TItinerario;
use Illuminate\Http\Request;

use GotoPeru\Http\Requests;

class ItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    public function show($id)
    {
        $itineario = ItinerarioPersonalizado::findOrFail($id);

        return view('itinerario', ['itinerario'=>$itineario]);
    }
    public function buscar_itinerario(Request $request)
    {
        $titulo=strtoupper($request->input('valor'));
        $itinerario = TItinerario::where('titulo','like','%'.$titulo.'%')->get();
        return view('secciones.show_buscar_itinerario',['itinerario'=>$itinerario]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function borrar_itinerario(Request $request)
    {
        //
        $itinerario_id=$request->input('id');
        $itinerario = ItinerarioCotizacion::FindOrFail($itinerario_id);
        if($itinerario->delete())
            return 1;
        else
            return 0;
    }
    public function borrar_itinerario_orden(Request $request)
    {
        //
        $id=$request->input('id');
        $objeto=ItinerarioOrden::FindOrFail($id);
        if($objeto->delete())
            return 1;
        else
            return 0;
    }
    public function guardar_itinerario_servicio(Request $request)
    {
        try {
            $nservicio = $request->input('nservicio');
            $iti_orden_id = $request->input('iti_orden');

//            return dd($titulo.'_'.$descipcion.'_'.$itinerario_id);
            foreach ($nservicio as $orden){
                $ordenVal=explode('_',$orden);

                $objeto= ItinerarioOrden();
                $objeto->nombre=$ordenVal[2];
                $objeto->precio=$ordenVal[3];
                $objeto->itinerario_cotizaciones_id=$ordenVal[0];
                $objeto->save();
            }


            return '1_1';
        }
        catch (\Exception $e) {
            return '0_0';
        }
    }



}
