<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\Cotizacion;
use GotoPeru\Pago;
use GotoPeru\PaqueteCotizacion;
use Illuminate\Http\Request;

class PaymentController extends Controller
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

        $pagos = Pago::with(['cotizaciones.cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente)->where('estado', 1);}])->get();

//        dd($pagos);
//        dd($cotizaciones);
        return view('history', ['cotizaciones'=>$cotizaciones, 'paquetes_num'=>$paquetes_num, 'pagos'=>$pagos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($i)
    {
        $idCliente=auth()->guard('cliente')->user()->id;

        $cotizaciones = Cotizacion::with(['cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])
            ->get()
            ->sortByDesc('fecha');

        $paquetes_num = PaqueteCotizacion::with(['cotizaciones.cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])->get();


//        dd($cotizaciones);
        return view('payment', ['cotizaciones'=>$cotizaciones, 'paquetes_num'=>$paquetes_num]);
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
