<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\TCity;
use GotoPeru\TCountry;
use GotoPeru\TPaquete;
use GotoPeru\TState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe_CardError;
use Stripe\Stripe_InvalidRequestError;


class CheckoutController extends Controller
{
    //

    public function store(Request $request)
    {
        //dd($request);
        \Stripe\Stripe::setApiKey("sk_live_kyaJ1qTzBut6TqCFV9Wd5Vea");
        try{
            $operacion=\Stripe\Charge::create(array(
                "amount"=>$request->input('total_p')*100,
                "currency"=>"usd",
                "source"=>$request->input('stripeToken'),
                "description"=>"New payment - Email:".$request->input('email_p')." - Name:".$request->input('first_name_p').", ".$request->input('last_name_p'),
            ));
            $dat=$request->input('date_travel_p');
            $txt_date_number=$dat[0];
            $title=$request->input('titulo_p');
            $paquete = TPaquete::with(['itinerario','paquetes_destinos', 'precio_paquetes','paquete_servicio_extra.servicio_extra','disponibilidad' => function($query)use($txt_date_number){$query->where('fecha_disponibilidad',$txt_date_number);}])
                ->get()
                ->where('titulo', $title);
            $country_=TCountry::findOrFail($request->input('country_p'));
            $state_=TState::findOrFail($request->input('state_p'));
            $city_=TCity::findOrFail($request->input('city_p'));
//            $pago=Pago::findOrFail($idPago);
//            $pago->fecha=date("Y-m-d");
//            $pago->estado=0;
//            $pago->medio="Tarjeta electronica";
//            $pago->transaccion=$operacion->id;
//            $pago->save();
            /* auth()->guard('cliente')->user()->nombres;*/

            $arre_extras_valor=array();
            $i=0;
            if(!empty($request->input('ch_extras_valor'))){
                foreach ($request->input('ch_extras_valor') as $valor){

                    $arre_extras_valor[$i]=$valor;
                    $i++;
                }
            }
            $arre_extras_name=array();
            $j=0;
            if(!empty($request->input('ch_extras_valor'))){
                foreach ($request->input('ch_extras_name') as $valor){

                    $arre_extras_name[$j]=$valor;
                    $j++;
                }
            }
            $arre_extras=array();
            $k=0;
            if(!empty($request->input('ch_extras_valor'))){
                foreach ($request->input('precio_optional_activities') as $valor){

                    $arre_extras[$k]=$valor;
                    $k++;
                }
            }

                $fecha1=explode('-',$dat);
                $fecha=$fecha1[2].'-'.$fecha1[1].'-'.$fecha1[0];
                $dias = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                $dia = $dias[date('w', strtotime($fecha))];

                $num = date("j", strtotime($fecha));
                $anno = date("Y", strtotime($fecha));
                $mes = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                $mes = $mes[(date('m', strtotime($fecha))*1)-1];
                $fecha_letra= $dia.', '.$mes.' '.$num.', '.$anno;

            $name_country='';
//            $email_cliente='fredy1432@hotmail.com';
//            $email_empresa='fredy1432@hotmail.com';

            $email_cliente=$request->input('email_p');
            $email_empresa='info@gotoperu.com';

            $name_pq=$request->input('first_name_p');
//            $emaila_agencia=$request->input('email_p');
            Mail::send(['html'=>'noti-reservation-client'], ['paquetes'=>$paquete,'first_name_p'=>$request->input('first_name_p'),
                'last_name_p'=>$request->input('last_name_p'),
                'name_country'=>$name_country,
                'telephone_p'=>$request->input('telephone_p'),
                'medio'=>'Electronic card',
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
                'precio_ononsimple_p'=>$request->input('precio_onsimple_p'),
                'ch_extras_name'=>$arre_extras_name,
                'ch_extras_precio'=>$arre_extras,
                'ch_extras_valor'=>$arre_extras_valor,
                'txt_name'=>$request->input('txt_name'),
                'last_name'=>$request->input('last_name'),
                'country'=>$request->input('country'),
                'travellers_p'=>$request->input('travellers_p'),
                'destino_travel'=>$request->input('destino_travel'),
                'date_travel'=>$fecha_letra,
                'nro_estrellas'=>$request->input('nro_estrellas'),
                'ch_extras_valor_count'=>$i,
                'email_p'=>$request->input('email_p'),
                'country_'=>$country_->name,
                'state_'=>$state_->name,
                'city_'=>$city_->name,
                'address_p'=>$request->input('address_p'),

            ], function ($messaje) use ($email_cliente,$name_pq){
                $messaje->to($email_cliente,$name_pq)
                    ->subject('Gotoperu - new purchase')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com','Gotoperu');
            });
            Mail::send(['html'=>'noti-reservation-empresa'], ['paquetes'=>$paquete,'first_name_p'=>$request->input('first_name_p'),
                'last_name_p'=>$request->input('last_name_p'),
                'name_country'=>$name_country,
                'telephone_p'=>$request->input('telephone_p'),
                'medio'=>'Electronic card',
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
                'precio_ononsimple_p'=>$request->input('precio_onsimple_p'),
                'ch_extras_name'=>$arre_extras_name,
                'ch_extras_precio'=>$arre_extras,
                'ch_extras_valor'=>$arre_extras_valor,
                'txt_name'=>$request->input('txt_name'),
                'last_name'=>$request->input('last_name'),
                'country'=>$request->input('country'),
                'travellers_p'=>$request->input('travellers_p'),
                'destino_travel'=>$request->input('destino_travel'),
                'date_travel'=>$fecha_letra,
                'nro_estrellas'=>$request->input('nro_estrellas'),
                'ch_extras_valor_count'=>$i,
                'email_p'=>$request->input('email_p'),
                'country_'=>$country_->name,
                'state_'=>$state_->name,
                'city_'=>$city_->name,
                'address_p'=>$request->input('address_p'),
            ],function ($messaje) use ($email_empresa,$email_cliente,$name_pq){
                $messaje->to($email_empresa,'Gotperu')
                    ->subject('Gotoperu - new purchase')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com','Gotoperu');
            });

            return view('mensaje-confirmacion',['first_name_p'=>$request->input('first_name_p'),
                'last_name_p'=>$request->input('last_name_p'),
                'name_country'=>$name_country,
                'telephone_p'=>$request->input('telephone_p'),
                'medio'=>'Electronic card',
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
                'precio_ononsimple_p'=>$request->input('precio_onsimple_p'),
                'ch_extras_name'=>$arre_extras_name,
                'ch_extras_precio'=>$arre_extras,
                'ch_extras_valor'=>$arre_extras_valor,
                'txt_name'=>$request->input('txt_name'),
                'last_name'=>$request->input('last_name'),
                'country'=>$request->input('country'),
                'travellers_p'=>$request->input('travellers_p'),
                'destino_travel'=>$request->input('destino_travel'),
                'date_travel'=>$fecha_letra,
                'nro_estrellas'=>$request->input('nro_estrellas'),
                'ch_extras_valor_count'=>$i,
                'estado'=>'1',
                'country_'=>$country_->name,
                'state_'=>$state_->name,
                'city_'=>$city_->name,
                'address_p'=>$request->input('address_p'),
            ])->with('success','Your pay was succesfull');
//            return redirect()->route('checkout_noti_path',['pago'=>$pago])->with('success','Your pay was succesfull');
//            return redirect()->route('payments_show_path',$idPago)->with('success','Your pay was succesfull');

        }
        catch(Exception $e){
            return view('mensaje-confirmacion',['first_name_p'=>$request->input('first_name_p'),
                'last_name_p'=>$request->input('last_name_p'),
                'name_country'=>$name_country,
                'telephone_p'=>$request->input('telephone_p'),
                'medio'=>'Electronic card',
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
                'precio_ononsimple_p'=>$request->input('precio_onsimple_p'),
                'ch_extras_name'=>$arre_extras_name,
                'ch_extras_precio'=>$arre_extras,
                'ch_extras_valor'=>$arre_extras_valor,
                'txt_name'=>$request->input('txt_name'),
                'last_name'=>$request->input('last_name'),
                'country'=>$request->input('country'),
                'travellers_p'=>$request->input('travellers_p'),
                'destino_travel'=>$request->input('destino_travel'),
                'date_travel'=>$fecha_letra,
                'nro_estrellas'=>$request->input('nro_estrellas'),
                'ch_extras_valor_count'=>$i,
                'estado'=>'0',
            ])->with('error','Ups! Something went wrong, try again');
//            return redirect()->route('payments_show_path',$idPago)->with('error',$e->getMessage());
        }
    }
    public function pay_confirmation()
    {
        return view('mensaje-confirmacion');
    }
    public function pay_confirmation_empresa()
    {
        return view('mensaje-confirmation_empresa');
    }
    public function buscar_disponibilidad(Request $request)
    {
        $codigo=strtoupper($request->input('codigo'));
        $paqueteCombo = TPaquete::with('disponibilidad')->where('titulo',$codigo)->get();
//        return view('mensaje-confirmation_empresa');
        $valor='';
        $valor.='<option value="0">Choose a date</option>';
        $precio=0;
        foreach ($paqueteCombo as $paquete){
            foreach ($paquete->disponibilidad as $disponibilidad) {
                if ($disponibilidad->estado == '1') {
                    $fecha1=explode('-',$disponibilidad->fecha_disponibilidad);
                    $fecha=$fecha1[2].'-'.$fecha1[1].'-'.$fecha1[0];
                    $dias = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                    $dia = $dias[date('w', strtotime($fecha))];

                    $num = date("j", strtotime($fecha));
                    $anno = date("Y", strtotime($fecha));
                    $mes = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
                    $fecha_letra= $dia.', '.$mes.' '.$num.', '.$anno;
                    $valor.='<option value="'.$disponibilidad->fecha_disponibilidad.'_'.$disponibilidad->precio_d.'">'.$fecha_letra.'</option>';
                    $precio=$disponibilidad->precio;
//                $valor +=  $disponibilidad->fecha_disponibilidad;
                }
            }
        }
        return  '<input type="hidden" value="'.$precio.'" name="txt_price"><select name="txt_date" id="date_travel" onclick="pasar()" onchange="this.form.submit();">'.$valor.'</select><label for="date_travel" class="grey-text text-darken-3">Other Dates</label>';
    }
    public function buscar_state(Request $request)
    {
        $codigo=strtoupper($request->input('codigo'));
        $states = TState::where('country_id',$codigo)->get();
      $valor='';
      foreach ($states as $state){
            $valor.='<option value="'.$state->id.'">'.$state->name.'</option>';
        }
        return  '<select name="state_p" id="state_p"  onchange="state_p_ch()" class="validate">'.$valor.'</select><label for="state_p" class="grey-text text-darken-3">State/Province <span class="blue-text">*</span></label>';
    }
    public function buscar_city(Request $request)
    {
        $codigo=strtoupper($request->input('codigo'));
        $cities = TCity::where('state_id',$codigo)->get();
        $valor='';
        foreach ($cities as $city){
            $valor.='<option value="'.$city->id.'">'.$city->name.'</option>';
        }
        return  '<select name="city_p" id="city_p" class="validate">'.$valor.'</select><label for="city_p" class="grey-text text-darken-3">City <span class="blue-text">*</span></label>';
    }
    public function buscar_otra_disponibilidad(Request $request)
    {
        $codigo=strtoupper($request->input('codigo'));
        $paqueteCombo = TPaquete::with('disponibilidad')->where('id',$codigo)->get();

        return redirect()->route('home_show_checkout_path', array('titulo'=>str_replace(' ','-', strtolower($codigo)), 'dias'=>$paqueteCombo->duracion.'-days-tours'));
    }

}
