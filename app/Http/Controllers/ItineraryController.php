<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\Cliente;
use GotoPeru\Cotizacion;
use GotoPeru\DestinoModelo;
use GotoPeru\ItinerarioCotizacion;
use GotoPeru\ItinerarioModelo;
use GotoPeru\ItinerarioOrden;
use GotoPeru\ItinerarioPersonalizado;
use GotoPeru\OrdenModelo;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PItinerario;
use GotoPeru\PItinerarioOrden;
use GotoPeru\PPaquete;
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $itineario = ItinerarioPersonalizado::findOrFail($id);

        return view('itinerario', ['itinerario' => $itineario]);
    }

    public function buscar_itinerario(Request $request)
    {
        $titulo = strtoupper($request->input('valor'));
        $itinerario = TItinerario::where('titulo', 'like', '%' . $titulo . '%')->get();
        return view('secciones.show_buscar_itinerario', ['itinerario' => $itinerario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function borrar_itinerario(Request $request)
    {
        //
        $itinerario_id = $request->input('id');
        $itinerario = ItinerarioCotizacion::FindOrFail($itinerario_id);
        if ($itinerario->delete())
            return 1;
        else
            return 0;
    }

    public function borrar_itinerario_orden(Request $request)
    {
        //
        $id = $request->input('id');
        $objeto = ItinerarioOrden::FindOrFail($id);
        if ($objeto->delete())
            return 1;
        else
            return 0;
    }

    public function guardar_itinerario_servicio(Request $request)
    {
        try {
            $iti_orden_id = $request->input('iti_orden');
            $nombre = 'nservicio_' . $iti_orden_id;
            $nservicio = $request->input($nombre);
            $results = [];

            foreach ($nservicio as $orden) {
                $ordenVal = explode('_', $orden);
                $objeto = new ItinerarioOrden();
                $objeto->nombre = $ordenVal[2];
                $objeto->precio = $ordenVal[3];
                $objeto->itinerario_cotizaciones_id = $ordenVal[0];
                $objeto->save();
                $results[] = ['id' => $objeto->id, 'value' => $objeto->id . '_' . $objeto->nombre . '_' . $objeto->precio];
            }

            return response()->json($results);
//            return '1_1';
        } catch (\Exception $e) {
            return '0';
        }
    }

    public function agregar_itineraios(Request $request)
    {
        try {
            $itinerarios = $request->input('itinerario');
            $paquete_id = $request->input('paquete_id');

            foreach ($itinerarios as $itinerario) {
                $iti = ItinerarioModelo::with('ordenes')->where('id', $itinerario)->get();
                foreach ($iti as $item) {
                    $new_iti = new ItinerarioCotizacion();
                    $new_iti->titulo = $item->titulo;
                    $new_iti->descripcion = $item->descripcion;
                    $new_iti->dias = $item->dia;
                    $new_iti->imagen = $item->imagen;
                    $new_iti->estado = $item->estado;
                    $new_iti->paquete_cotizaciones_id = $paquete_id;
                    $new_iti->save();
                    foreach ($item->ordenes as $orden) {
                        $new_orden = new ItinerarioOrden();
                        $new_orden->nombre = $orden->orden_modelo->nombre;
                        $new_orden->observacion = $orden->orden_modelo->observacion;
                        $new_orden->precio = $orden->orden_modelo->precio;
                        $new_orden->itineraio_cotizaciones_id = $new_iti->id;
                    }
                }
            }
            $cotizacion_id = $request->input('cotizacion_id');
            $cliente_id = $request->input('cliente_id');
            $cliente_ = Cliente::FindOrFail($cliente_id);
            $cotizacion_ = Cotizacion::FindOrFail($cotizacion_id);

            $paquete = PaqueteCotizacion::with('precio_paquetes', 'destinos', 'itinerario_cotizaciones.ordenes')->get()->where('id', $paquete_id);
            $destinos = DestinoModelo::get();

            $ordenes1 = OrdenModelo::get();

            $itinerarios = ItinerarioModelo::with('ordenes')->get();
            return view('configurar-itinerario', ['cotizaciones' => $cotizacion_, 'cliente' => $cliente_, 'destinos' => $destinos, 'paquete' => $paquete, 'ordenes1' => $ordenes1, 'itinerarios' => $itinerarios]);
        } catch (\Exception $e) {
            return '0_0';
        }
    }
    public function paquete_agregar_itineraios(Request $request){
        try {
            $itinerarios = $request->input('itinerario');
            $paquete_id = $request->input('paquete_id');

            foreach ($itinerarios as $itinerario) {
                $iti = ItinerarioModelo::with('ordenes.orden_modelo')->where('id', $itinerario)->get();
//                return dd($iti);
                foreach ($iti as $item) {
                    $new_iti = new PItinerario();
                    $new_iti->titulo = $item->titulo;
                    $new_iti->descripcion = $item->descripcion;
                    $new_iti->dias = $item->dia;
                    $new_iti->imagen = $item->imagen;
//                    $new_iti->estado = $item->estado;
                    $new_iti->ppaquete_id = $paquete_id;
                    $new_iti->save();
                    foreach ($item->ordenes as $orden1) {
//                        return dd($orden1->orden_modelo->nombre);
//                        foreach ($orden1->orden_modelo as $orden) {
//                            return dd($orden);
                            $new_orden = new PItinerarioOrden();
                            $new_orden->nombre = $orden1->orden_modelo->nombre;
//                            $new_orden->observacion = $orden->observacion;
                            $new_orden->precio = $orden1->orden_modelo->precio;
                            $new_orden->pitinerario_id = $new_iti->id;
//                        }
                    }
                }
            }
            $paquete = PPaquete::with('precios', 'destinos', 'itinerarios.ordenes')->get()->where('id', $paquete_id);
            $destinos = DestinoModelo::get();
            $ordenes1 = OrdenModelo::get();

            $itinerarios = ItinerarioModelo::with('ordenes')->get();
            return view('configurar-itinerario-p', ['destinos' => $destinos, 'paquete' => $paquete, 'ordenes1' => $ordenes1, 'itinerarios' => $itinerarios]);
        } catch (\Exception $e) {
            return $e;
        }
    }
}
