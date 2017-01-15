<?php

namespace GotoPeru\Http\Controllers;

use Illuminate\Http\Request;
use GotoPeru\Pago;
use GotoPeru\Cotizacion;
use GotoPeru\Cliente;
use GotoPeru\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe_CardError;
use Stripe\Stripe_InvalidRequestError;

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


        $cotizaciones = Cotizacion::with('paquete_cotizaciones.precio_paquetes','paquete_cotizaciones.paquetes_destinos')->get()
            ->where('clientes_id',$idCliente)
            ->sortByDesc('fecha');

        $pagos = Cliente::with('cotizaciones.pagos')
                ->where('id',$idCliente)
                ->get();
                //->sortByDesc('fecha');

        //$pagos=Pago::findOrFail($idCotizacion);
        //dd($pagos);
        return view('payments',['pagos'=>$pagos, 'cotizaciones'=>$cotizaciones]);
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
        \Stripe\Stripe::setApiKey("sk_live_kyaJ1qTzBut6TqCFV9Wd5Vea");
        try{
//            $customer = Customer::create([
//                'card' => $request->input('stripeToken'),
//                'description' => $request->input('email')
//            ]);
            $operacion=\Stripe\Charge::create(array(
                "amount"=>$request->input('amount')*100,
                "currency"=>"usd",
                "source"=>$request->input('stripeToken'),
//                "customer"=>$customer->id,
                "description"=>"New payment - Email:".$request->input('email')." - Pasaporte:".$request->input('pasaporte')." - Name:".$request->input('first-name').", ".$request->input('last-name'),
            ));
            $pago=Pago::findOrFail($idPago);
            $pago->fecha=date("Y-m-d");
            $pago->estado=0;
            $pago->medio="Tarjeta electronica";
            $pago->transaccion=$operacion->id;
//            $pago->transaccion=98;
            $pago->save();
//            /* auth()->guard('cliente')->user()->nombres;*/
            $email='fredy1432@hotmail.com';
//            $email=$request->input('email');
            Mail::send(['html'=>'notification'], ['pago'=>$pago], function ($messaje) use ($email){
                $messaje->to($email,'Freddy')
                    ->subject('You have a new payment')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com','Gotoperu');
            });
            //return redirect()->route('payments_noti_path',['pago'=>$pago])->with('success','Your pay was succesfull');
            return redirect()->route('payments_show_path',$idPago)->with('success','Your pay was succesfull');

        }
        catch (Stripe_InvalidRequestError $e ) {

            return redirect()->route('payments_show_path',$idPago)->with('error','Invalid request error');


        }
        catch (Stripe_CardError $e) {
            return redirect()->route('payments_show_path',$idPago)->with('error','Card was declined');
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
        $idCliente=auth()->guard('cliente')->user()->id;

        $pago=Pago::findOrFail($idPago);

        $cotizaciones = Cotizacion::with('paquete_cotizaciones.precio_paquetes','paquete_cotizaciones.paquetes_destinos')->get()
            ->where('clientes_id',$idCliente)
            ->sortByDesc('fecha');

        //dd($pago);
        return view('payments-show',['pago'=>$pago, 'cotizaciones'=>$cotizaciones]);

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

    public function send($id)
    {
        dd($id);
        return view('notification',['pago'=>$id]);
    }

}
