<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\ItinerarioPersonalizado;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
