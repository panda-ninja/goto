<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\ItinerarioModelo;
use GotoPeru\ItinerarioOrdenModelo;
use GotoPeru\OrdenModelo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ItineraryNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itinerario = ItinerarioModelo::get();
        return view('itinerary-new', ['itinerario'=>$itinerario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = OrdenModelo::get();
        return view('itinerary-new-add', ['servicios'=>$servicios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itinerario_e = ItinerarioModelo::get()->where('titulo', $request->get('titulo_txt'));
        if ($itinerario_e->count() > 0){
            return redirect()->route('admin_itinerary_new_path')->with('success','El itinerario ya existe');
        }else{

            $file = $request->file('file');
            $filename = strtolower(str_replace(' ','-', $request->get('titulo_txt'))).'.jpg';

            $itinerario = new ItinerarioModelo();
            $itinerario->dia = "1";
            $itinerario->titulo = $request->get('titulo_txt');
            $itinerario->descripcion = $request->get('descipcion_txt');
            $itinerario->imagen = $filename;
            $itinerario->save();

            $services = $request->get('services');
            foreach ($services as $service){
                $services = new ItinerarioOrdenModelo();
                $services->orden_modelo_id = $service;
                $services->itinerario_modelo_id = $itinerario->id;
                $services->save();
            }

            if ($file){
                Storage::disk('itinerary')->put($filename,  File::get($file));
            }
            return redirect()->route('admin_itinerary_new_path')->with('success','Itinerario agregado satisfactoriamente');
        }
    }

    public function getItineraryImage($filename){
        $file = Storage::disk('itinerary')->get($filename);
        return new Response($file, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itinerario = ItinerarioModelo::findOrFail($id);
        $itinerario_orden_modelo = ItinerarioOrdenModelo::get()->where('itinerario_modelo_id', $id);
        $servicios = OrdenModelo::get();
        return view('itinerary-new-edit', ['servicios'=>$servicios, 'itinerario'=>$itinerario, 'itinerario_orden_modelo'=>$itinerario_orden_modelo]);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itinerario = ItinerarioModelo::findOrFail($id);
        $itinerario->delete();

        Session::flash('message', $itinerario->titulo.': Fue eliminado satisfactoriamente');

        return redirect()->route('admin_itinerary_new_path');
    }
}
