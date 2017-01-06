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
            $operacion=\Stripe\Charge::create(array(
                "amount"=>$request->input('total_p')*100,
                "currency"=>"usd",
                "source"=>$request->input('stripeToken'),
                "description"=>"New payment - Email:".$request->input('email_p')." - Name:".$request->input('first_name_p').", ".$request->input('last_name_p'),
            ));


//            $pago=Pago::findOrFail($idPago);
//            $pago->fecha=date("Y-m-d");
//            $pago->estado=0;
//            $pago->medio="Tarjeta electronica";
//            $pago->transaccion=$operacion->id;
//            $pago->save();
            /* auth()->guard('cliente')->user()->nombres;*/
            $name_country='';
            $emaila_agencia='fredy1432@hotmail.com';
            Mail::send(['html'=>'noti-reservation-client'], ['first_name_p'=>$request->input('first_name_p'),
                'last_name_p'=>$request->input('last_name_p'),
                'name_country'=>$name_country,
                'telephone_p'=>$request->input('telephone_p'),
                'medio'=>'Tarjeta electronica',
                'transaccion'=>$operacion->id,
                'fecha_factura'=>Date('Y-m-d h:m:s'),
                'total'=>$request->input('total_p'),
                'titulo_p'=>$request->input('titulo_p'),
                'nrodias_p'=>$request->input('nrodias_p'),
                'nro_ontriple_p'=>$request->input('nro_ontriple_p'),
                'precio_ontriple_p'=>$request->input('precio_ontriple_p'),
                'nro_ondouble_p'=>$request->input('nro_ondouble_p'),
                'precio_ondouble_p'=>$request->input('precio_ondouble_p'),
                'nro_onmatrimonial_p'=>$request->input('nro_onmatrimonial_p'),
                'precio_onmatrimonial_p'=>$request->input('precio_onmatrimonial_p'),
                'nro_onsimple_p'=>$request->input('nro_onsimple_p'),
                'precio_ononsimple_p'=>$request->input('precio_ononsimple_p'),
                'ch_extras'=>$request->input('ch_extras'),
                'txt_name'=>$request->input('txt_name'),
                'last_name'=>$request->input('last_name'),
                'country'=>$request->input('country'),
                'travellers_p'=>$request->input('travellers_p'),
            ], function ($messaje) use ($emaila_agencia){
                $messaje->to($emaila_agencia,'Freddy')
                    ->subject('New reservation')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com','Gotoperu');
            });
            return redirect()->route('home_path');
            //return redirect()->route('payments_noti_path',['pago'=>$pago])->with('success','Your pay was succesfull');
//            return redirect()->route('payments_show_path',$idPago)->with('success','Your pay was succesfull');

        }
        catch(Exception $e){

//            return redirect()->route('payments_show_path',$idPago)->with('error',$e->getMessage());
        }
    }
}
