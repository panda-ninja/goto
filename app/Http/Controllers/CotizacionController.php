<?php

namespace GotoPeru\Http\Controllers;


use GotoPeru\Cliente;
use GotoPeru\Cotizacion;
use GotoPeru\PaqueteCotizacion;
use Illuminate\Http\Request;
//use Symfony\Component\HttpKernel\Client;

class CotizacionController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function nuevacotizacion()
    {
        return view('nuevacotizacion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar_pre_cotizacion(Request $request)
    {
        $email=$request->input('email');
        $nropasa=$request->input('nropasajeros');
        $fecha=$request->input('fecha');
//     return $email.'/'.$nropasa.'/'.$fecha;
//        dd($request);
        try{
            $cliente = Cliente::where('email',$email)->get();
            //dd($cliente);
            if(count($cliente)>0){

//                return $cliente[0]->nombres;
                $cotizacion=new Cotizacion();
                $cotizacion->nropersonas=$nropasa;
                $cotizacion->fecha=$fecha;
                $cotizacion->estado="6";/*-- 6=pre cotizacion*/
                $cotizacion->clientes_id=$cliente[0]->id;
                $cotizacion->users_id=auth()->guard('admin')->user()->id;
                $cotizacion->save();
                return $cotizacion->id;
            }
            else{
                return '0';
            }
//           return  $cliente->id;
//            return count($cliente);
        }
        catch(Exception $e){
            return $e;
        }
    }
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
