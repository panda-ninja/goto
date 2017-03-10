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
use Illuminate\Support\Facades\Mail;
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

        $cotizaciones = Cotizacion::with(['cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])
            ->get()
            ->sortByDesc('fecha');

        $paquetes_num = PaqueteCotizacion::with(['cotizaciones.cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])->get();

//        dd($cotizaciones);
        return view('quotes', ['cotizaciones'=>$cotizaciones, 'paquetes_num'=>$paquetes_num]);
    }

    public function confirm()
    {

        $idCliente=auth()->guard('cliente')->user()->id;
        $cotizaciones = Cotizacion::with(['cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])
            ->get()
            ->sortByDesc('fecha');

        $paquetes_num = PaqueteCotizacion::with(['cotizaciones.cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])->get();

        return view('confirm', ['cotizaciones'=>$cotizaciones, 'paquetes_num'=>$paquetes_num]);
    }

    public function pending()
    {

        $idCliente=auth()->guard('cliente')->user()->id;
        $cotizaciones = Cotizacion::with(['cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])
            ->get()
            ->sortByDesc('fecha');

        $paquetes_num = PaqueteCotizacion::with(['cotizaciones.cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])->get();

        return view('pending', ['cotizaciones'=>$cotizaciones, 'paquetes_num'=>$paquetes_num]);
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

        $paquete_2 = PaqueteCotizacion::findOrFail($id);
        if ($paquete_2->estado == '1'){
            $paquete_2->estado = '2';
            $paquete_2->save();
        }


        $idCliente=auth()->guard('cliente')->user()->id;

        $cotizaciones = Cotizacion::with(['cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])
            ->get()
            ->sortByDesc('fecha');


        $paquete = PaqueteCotizacion::with('precio_paquetes','paquetes_destinos','itinerario_cotizaciones.horas_cotizaciones', 'itinerario_cotizaciones.servicios_cotizaciones')
            ->get()
            ->where('id', $id);

        $paquete_post = PaqueteCotizacion::with('cotizaciones')->get()
            ->where('cotizaciones_id',$paquete_2->cotizaciones_id)->sortByDesc('fecha');

        $paquetes_num = PaqueteCotizacion::with(['cotizaciones.cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])->get();


        if ($paquete->count()>0){
           return view('itinerary_quotes', ['paquetes'=>$paquete, 'paquetes_num'=>$paquetes_num, 'paquete_post'=>$paquete_post, 'cotizaciones'=>$cotizaciones]);
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
        $idCliente=auth()->guard('cliente')->user();
        $from = 'hidalgo@pandaninja.com.pe';

        $paquete = PaqueteCotizacion::findOrFail($id);

        $paquete_post = PaqueteCotizacion::with('cotizaciones')->get()
            ->where('cotizaciones_id',$paquete->cotizaciones_id);

        foreach ($paquete_post as $paquete_pos){
            if ($paquete_pos->id == $id){
                $paquete1 = PaqueteCotizacion::findOrFail($paquete_pos->id);
                $paquete1->estado = '3';
                $paquete1->save();
            }else{
                $paquete1 = PaqueteCotizacion::findOrFail($paquete_pos->id);
                $paquete1->estado = '4';
                $paquete1->save();
            }
        }

        $cotizacion = Cotizacion::findOrFail($paquete->cotizaciones_id);
        $cotizacion->estado = '1';
        $cotizacion->save();


        try {
            Mail::send(['html' => 'confirm_notification'], ['name' => $idCliente->nombres, 'apellido' => $idCliente->apellidos, 'codigo' => $paquete->codigo, 'titulo' => $paquete->titulo], function ($messaje) use ($idCliente) {
                $messaje->to($idCliente->email, $idCliente->nombres)
                    ->subject('Inquire GotoPeru')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru');
            });


            Mail::send(['html' => 'confirm_notifications_admin'], ['name' => $idCliente->nombres, 'apellido' => $idCliente->apellidos, 'codigo' => $paquete->codigo, 'titulo' => $paquete->titulo], function ($messaje) use ($from) {
                $messaje->to($from, 'GotoPeru')
                    ->subject('Inquire GotoPeru.Travel')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru.Travel');
            });


//            Session::flash('message', $name.' hola');


            return redirect()->route('quotes_show_path', $paquete->id)->with('success','Paquete confirmado');

//            return redirect()->route('home_path');
        }
        catch (Exception $e){
            return $e;
        }



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
