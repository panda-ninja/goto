<?php

namespace GotoPeru\Http\Controllers;

use Illuminate\Http\Request;
use GotoPeru\Pago;
use GotoPeru\Cotizacion;
use GotoPeru\Cliente;
use GotoPeru\Http\Requests;
use Stripe\Stripe;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idCliente=auth()->guard('cliente')->user()->id;

        $pagos = Cliente::with('cotizaciones.pagos')
                ->where('id',$idCliente)
                ->get();
                //->sortByDesc('fecha');

        //$pagos=Pago::findOrFail($idCotizacion);
        //dd($pagos);
        return view('payments',['pagos'=>$pagos]);
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
    public function store(Request $request,$idPago)
    {
        //dd($request);
        \Stripe\Stripe::setApiKey("sk_test_LrBb0V9M539t1l7f9x7LhfvJ");
        try{
            $operacion=\Stripe\Charge::create(array(
                "amount"=>$request->input('amount')*100,
                "currency"=>"usd",
                "source"=>$request->input('stripeToken'),
                "description"=>"New payment - Email:".$request->input('email')." - Pasaporte:".$request->input('pasaporte')." - Name:".$request->input('first-name').", ".$request->input('last-name'),
            ));
            $pago=Pago::findOrFail($idPago);
            $pago->fecha=date("Y-m-d");
            $pago->estado=1;
            $pago->medio="Tarjeta electronica";
            $pago->transaccion=$operacion->id;
            $pago->save();
            return redirect()->route('payments_show_path',$idPago)->with('success','Your pay was succesfull');
        }
        catch(Exception $e){
            return redirect()->route('payments_show_path',$idPago)->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPago)
    {
        $pago=Pago::findOrFail($idPago);
        //dd($pago);
        return view('payments-show',['pago'=>$pago]);

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
