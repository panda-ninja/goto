<?php

namespace GotoPeru\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;


class CheckoutController extends Controller
{
    //
    public function store(Request $request)
    {
        //dd($request);
        \Stripe\Stripe::setApiKey("sk_test_LrBb0V9M539t1l7f9x7LhfvJ");
        try{
//            $operacion=\Stripe\Charge::create(array(
//                "amount"=>$request->input('total_p')*100,
//                "currency"=>"usd",
//                "source"=>$request->input('stripeToken'),
//                "description"=>"New payment - Email:".$request->input('email_p')." - Name:".$request->input('first-name_p').", ".$request->input('last-name_p'),
//            ));


//            $pago=Pago::findOrFail($idPago);
//            $pago->fecha=date("Y-m-d");
//            $pago->estado=0;
//            $pago->medio="Tarjeta electronica";
//            $pago->transaccion=$operacion->id;
//            $pago->save();
            /* auth()->guard('cliente')->user()->nombres;*/
            $emaila_agencia='fredy1432@hotmail.com';
            Mail::send(['html'=>'noti-reservation-client'], ['first_name_p'=>$request->input('first-name_p'),'last_name_p'=>$request->input('last-name_p')], function ($messaje) use ($emaila_agencia){
                $messaje->to($emaila_agencia,'Freddy')
                    ->subject('New reservation')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com','Gotoperu');
            });
            //return redirect()->route('payments_noti_path',['pago'=>$pago])->with('success','Your pay was succesfull');
//            return redirect()->route('payments_show_path',$idPago)->with('success','Your pay was succesfull');

        }
        catch(Exception $e){

//            return redirect()->route('payments_show_path',$idPago)->with('error',$e->getMessage());
        }
    }
}
