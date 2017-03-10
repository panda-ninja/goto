<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\Cliente;
use GotoPeru\ClienteCotizacion;
use GotoPeru\Cotizacion;
use GotoPeru\PaqueteCotizacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteCotizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $idCliente=auth()->guard('cliente')->user()->id;
        $cotizaciones = Cotizacion::with(['cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente)->where('estado', 1);}])
            ->get()
            ->sortByDesc('fecha');

        $clienteCotizacion = ClienteCotizacion::with('cliente')->get()
            ->where('cotizaciones_id', $id)
        ->sortByDesc('estado');

        $paquetes_num = PaqueteCotizacion::with(['cotizaciones.cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])->get();

        return view('groups', ['cotizaciones'=>$cotizaciones, 'paquetes_num'=>$paquetes_num, 'clienteCotizacion'=>$clienteCotizacion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
//        $validator = Validator::make($request->all(), [
//            'nombres' => 'required',
//            'email' => 'required',
//        ]);
//
//        if($validator->fails()){
//            return redirect()
//                ->route('group_path', $id);
//        }


        $cliente = new Cliente();
        $cliente->nombres = $request->get('name_txt');
        $cliente->email = $request->get('email');
        $cliente->save();

        $cliente_cotizacion = new ClienteCotizacion();
        $cliente_cotizacion->cotizaciones_id = $id;
        $cliente_cotizacion->clientes_id = $cliente->id;
        $cliente_cotizacion->estado = 0;
        $cliente_cotizacion->save();

        return redirect()->route('group_path', $id)->with('success','se guardo');
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
