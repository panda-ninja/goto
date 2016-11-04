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
    public function store(Request $request)
    {
        Stripe::setApiKey();
        try{
            Stripe::create(array(
                "amount"=>$request->input('amount')*100,
                "currency"=>"us",
                "source"=>$request->input('stripeToken'),
                "descripction"=>"nuevo pago"
            ));
        }
        catch(\Exception $e){
            return redirect()->route('payments_show_path',$request->input('idpago'))->with('error',$e->getMessage());
        }
        return redirect()->route('payments_show_path',$request->input('idpago'))->with('success','Compra Correcta');
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
