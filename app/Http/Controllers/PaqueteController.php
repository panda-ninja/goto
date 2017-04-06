<?php

namespace GotoPeru\Http\Controllers;
use GotoPeru\Cliente;
use GotoPeru\Cotizacion;
use GotoPeru\DestinoCotizacion;
use GotoPeru\DestinoModelo;
use GotoPeru\DestinoPaqueteCotizacion;
use GotoPeru\ItinerarioCotizacion;
use GotoPeru\ItinerarioModelo;
use GotoPeru\ItinerarioOrden;
use GotoPeru\OrdenModelo;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\PDestino;
use GotoPeru\PItinerario;
use GotoPeru\PItinerarioOrden;
use GotoPeru\PPrecio;
use GotoPeru\PrecioPaquete;
use GotoPeru\ServicioCotizacion;
use GotoPeru\TDestino;
use GotoPeru\TPaqueteDestino;
use GotoPeru\TItinerario;
use GotoPeru\TPaquete;
use GotoPeru\PPaquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PaqueteController extends Controller
{

    public function index(){
        $packages = PPaquete::get();
        return view('current-list-packages', ['packages'=>$packages]);
    }

    public function nuevo_paquete(){
        $destinos=DestinoModelo::get();
        return view('nuevo-paquete',['destinos'=>$destinos]);

    }

    public function buscar_plan(Request $request)
    {
        $cotizacion_id = $request->input('cotizacion_id');
        $cliente_id = $request->input('cliente_id');
        $cliente_ = Cliente::FindOrFail($cliente_id);
        $cotizacion_ = Cotizacion::FindOrFail($cotizacion_id);

        $codigo = explode(' ', strtoupper($request->input('codigo')));
        $ppaquete = PPaquete::with('precios','itinerarios')->get()->where('codigo', $codigo[0]);
//        dd($paquete);
        $destino = DestinoModelo::all();
        //$id = TPaquete::where('codigo', $codigo[0])->get();
//        dd($id[0]->id);
        //$destino_paquete = TPaqueteDestino::with('destinos')->where('idpaquetes', $id[0]->id)->get();
//        dd($destino_paquete);
//        $itinerarios=ItinerarioModelo::with('itinerarios')->get();
        /*-- guardamos el plan + los destinos*/
        foreach ($ppaquete as $paquete) {
            $new_paquete = new PaqueteCotizacion();
            $new_paquete->codigo = $codigo[0];
            $new_paquete->titulo = $paquete->titulo;
            $new_paquete->duracion = $paquete->duracion;
            $new_paquete->preciocosto = $paquete->preciocosto;
            $new_paquete->descripcion = $paquete->descripcion;
            $new_paquete->incluye = $paquete->incluye;
            $new_paquete->noincluye = $paquete->noincluye;
            $new_paquete->opcional = $paquete->opcional;
            $new_paquete->imagen = $paquete->imagen;
            $new_paquete->cotizaciones_id = $cotizacion_id;
            $new_paquete->save();
            foreach ($paquete->precios as $precio){
                $new_precio=new PrecioPaquete();
                $new_precio->estrellas=$precio->estrellas;
                $new_precio->precio_s=$precio->precio_s;
                $new_precio->personas_s=$precio->personas_s;
                $new_precio->precio_d=$precio->precio_d;
                $new_precio->personas_d=$precio->personas_d;
                $new_precio->precio_m=$precio->precio_m;
                $new_precio->personas_m=$precio->personas_m;
                $new_precio->precio_t=$precio->precio_t;
                $new_precio->personas_t=$precio->personas_t;
                $new_precio->utilidad=40;
                $new_precio->estado=$precio->estado;
                $new_precio->paquete_cotizaciones_id=$new_paquete->id;
                $new_precio->save();
            }
            foreach ($paquete->destinos as $destino){
                $new_destino=new DestinoCotizacion();
                $new_destino->codigo=$destino->codigo;
                $new_destino->destino=$destino->destino;
                $new_destino->region=$destino->region;
                $new_destino->pais=$destino->pais;
                $new_destino->descripcion=$destino->descripcion;
                $new_destino->imagen=$destino->imagen;
                $new_destino->estado=$destino->estado;
                $new_destino->paquete_cotizaciones_id=$new_paquete->id;
                $new_destino->save();
            }
            foreach ($paquete->itinerarios as $itinerario){
                $new_itinerario=new ItinerarioCotizacion();
                $new_itinerario->titulo=$itinerario->titulo;
                $new_itinerario->descripcion=$itinerario->descripcion;
                $new_itinerario->dias=$itinerario->dias;
                $new_itinerario->fecha=$itinerario->fecha;
                $new_itinerario->precio=$itinerario->precio;
                $new_itinerario->imagen=$itinerario->imagen;
                $new_itinerario->estado=$itinerario->estado;
                $new_itinerario->paquete_cotizaciones_id=$new_paquete->id;
                $new_itinerario->save();

                foreach ($itinerario->ordenes as $orden){
                    $new_orden = new ItinerarioOrden();
                    $new_orden->nombre=$orden->nombre;
                    $new_orden->observacion=$orden->observacion;
                    $new_orden->precio=$orden->precio;
                    $new_orden->itinerario_cotizaciones_id=$new_itinerario->id;
                    $new_orden->save();
                }
            }
        }
        $paquete = PaqueteCotizacion::with('precio_paquetes','itinerario_cotizaciones')->get()->where('id',$new_paquete->id);
        $destinos=DestinoModelo::get();
//        dd($destinos);
        return view('configurar_paquete_plan',['cotizaciones'=>$cotizacion_,'cliente'=>$cliente_,'destinos'=>$destinos,'paquete'=>$paquete]);
    }
    public function autocompletecodigo(Request $request)
    {
        if ($request->ajax()) {
            $results = [];
            $codigo=strtoupper($request->input('codigo'));
            $paquete = PPaquete::where('codigo', 'like', '%'.$codigo.'%')
                ->orWhere('titulo','like','%'.$codigo.'%')
                ->get();
            foreach ($paquete as $query){
                $results[] = ['id' => $query->id, 'value' => $query->codigo.' '.$query->titulo];
            }
            return response()->json($results);
        }
    }

    //
    public function buscar(Request $request)
    {
        $codigo=strtoupper($request->input('codigo'));
        $paquete = TPaquete::with('paquetes_destinos.destinos', 'precio_paquetes','itinerario')->get()->where('codigo',$codigo);

//        $paquete=Paquete::with('itinerario_personalizados.servicios','itinerario_personalizados.itinerario_x_horas')->get()->where('codigo',$codigo);
//['paquete'=>$paquete]
        //return dd($paquete);
        $destino=TDestino::all();
        //dd($paquete);
        $itinerios=TItinerario::distinct()->select('titulo')->get();
//        dd($itinerios);
        return view('secciones.show_paquete',['paquete'=>$paquete,'destino'=>$destino,'itinerarios1'=>$itinerios]);


        //
//        if($request->ajax()){
//            $paquete="vista del paquete";
////            $paquete=PaquetePersonalizado->where('codigo',$request->codigo);
////            dd($paquete);
//            if($paquete){
//                return Response($paquete);
//            }
//        }




//        $codigo=Request::get('codigo');
//        $paquete=PaquetePersonalizado::where('codigo',$codigo);
//        if(Request::wantsJson()) return $paquete;
//        return 'holaaaaaaaaaaaaaaaa';
////
    }
    public function nuevo(Request $request)
    {
//        $codigo=strtoupper($request->input('codigo'));
//        $paquete = TPaquete::with('paquetes_destinos.destinos', 'precio_paquetes','itinerario')->get()->where('codigo',$codigo);

//        $paquete=Paquete::with('itinerario_personalizados.servicios','itinerario_personalizados.itinerario_x_horas')->get()->where('codigo',$codigo);
//['paquete'=>$paquete]
        //return dd($paquete);
        $destino=DestinoCotizacion::get();
        //dd($paquete);
//        $itinerios=TItinerario::distinct()->select('titulo')->get();
//        dd($itinerios);
//        return view('secciones.show_nuevo_paquete',['paquete'=>$paquete,'destino'=>$destino,'itinerarios1'=>$itinerios]);
        return view('secciones.show_nuevo_paquete',['destino'=>$destino]);

    }

    public function editar_pqt(Request $request)
    {
        //
        $codigo_txt=strtoupper($request->input('codigo_txt'));
        $duracion_txt=strtoupper($request->input('duracion_txt'));
        $titulo_txt=strtoupper($request->input('titulo_txt'));
        $descipcion_txt=strtoupper($request->input('descipcion_txt'));
        $opcional_txt=strtoupper($request->input('opcional_txt'));
        $incluye_txt=strtoupper($request->input('incluye_txt'));
        $noincluye_txt=strtoupper($request->input('noincluye_txt'));
        $imagen=strtoupper($request->input('imagen'));
        $path='';
        $paquete_id=strtoupper($request->input('paquete_id'));
//        return ($paquete_id);
        $newPaquete=PaqueteCotizacion::FindOrFail($paquete_id);
        $newPaquete->codigo=$codigo_txt;
        $newPaquete->titulo=$titulo_txt;
        $newPaquete->duracion=$duracion_txt;
        $newPaquete->descripcion=$descipcion_txt;
        $newPaquete->incluye=$incluye_txt;
        $newPaquete->noincluye=$noincluye_txt;
        $newPaquete->opcional=$opcional_txt;
        $newPaquete->imagen=$path;
//        dd($newPaquete);
        if($newPaquete->save())
            return '1_Bien hecho! Paquete editado creectamente';
        else
            return '0_Ups! Error a editar el papuete, vuelva a intentarlo';
    }
    public function editar_destinos(Request $request)
    {
        try {
            $destinos = $request->input('destino');
//            return dd($destinos);
            $paquete_id = $request->input('paquete_id');
//            return dd($paquete_id);
            $antiguos_destinos = DestinoCotizacion::where('paquete_cotizaciones_id', $paquete_id)->delete();
            $valor='';
            foreach ($destinos as $destino) {
//                $valor.=$destino.'_';
                $modelo = DestinoModelo::where('destino', $destino)->get();
                foreach ($modelo as $modelo_){
                    $newModelo = new DestinoCotizacion();
                    $newModelo->codigo = $modelo_->codigo;
                    $newModelo->destino = $modelo_->destino;
                    $newModelo->region = $modelo_->region;
                    $newModelo->pais = $modelo_->pais;
                    $newModelo->descripcion = $modelo_->descripcion;
                    $newModelo->imagen = $modelo_->imagen;
                    $newModelo->estado = $modelo_->estado;
                    $newModelo->paquete_cotizaciones_id = $paquete_id;
                    $newModelo->save();
                }
//
            }
//            return $valor;
            return '1_Bien hecho! Destinos editado creectamente';
        }
        catch (\Exception $e) {
            return '0_Ups! Error a editar los destinos, vuelva a intentarlo';
        }
    }
    public function editar_itinerario(Request $request)
    {
        try {

            $descipcion = $request->input('descipcion_txt');
            $itinerario_id = $request->input('itinerario_id');

//            return dd($titulo.'_'.$descipcion.'_'.$itinerario_id);
            $itinerario=ItinerarioCotizacion::FindOrFail($itinerario_id);
            $itinerario->observaciones=$descipcion;
            $itinerario->save();

            return $itinerario_id.'_1_Bien hecho! observaciones editado creectamente_'.$descipcion;
        }
        catch (\Exception $e) {
            return '0_0_Ups! Error a editar el observaciones, vuelva a intentarlo_'.$descipcion;
        }
    }
    public function editar_paquete_itinerario_obs(Request $request)
    {
        try {
            $obs = $request->input('obs_txt');
            $itinerario_id = $request->input('itinerario_id');

//            return dd($titulo.'_'.$descipcion.'_'.$itinerario_id);
            $itinerario=ItinerarioCotizacion::FindOrFail($itinerario_id);
            $itinerario->observaciones=$obs;
            $itinerario->save();

            return $itinerario_id.'_1_Bien hecho! Itinerario editado creectamente_'.$obs;
        }
        catch (\Exception $e) {
            return '0_0_Ups! Error a editar el itinerario, vuelva a intentarlo_'.$obs;
        }
    }
    public function editar_paquete_itinerario_serv(Request $request)
    {
        try {
            $precio = $request->input('precio_txt');
            $orden_id = $request->input('orden_id');

//            return dd($titulo.'_'.$descipcion.'_'.$itinerario_id);
            $servicio= ItinerarioOrden::FindOrFail($orden_id);
            $servicio->precio=$precio;
            $servicio->save();

            return $servicio->id.'_1_Bien hecho! Itinerario editado creectamente_'.$precio;
        }
        catch (\Exception $e) {
            return '0_0_Ups! Error a editar el itinerario, vuelva a intentarlo_'.$precio;
        }
    }
    public function guardar_precios_proposal(Request $request){
        try {
            $cliente_id=$request->input('cliente_id');
            $acom_t = $request->input('acom_t');
            $acom_d = $request->input('acom_d');
            $acom_m = $request->input('acom_m');
            $acom_s = $request->input('acom_s');

            $star_2 = $request->input('vstar_2');
            $star_3 = $request->input('vstar_3');
            $star_4 = $request->input('vstar_4');
            $star_5 = $request->input('vstar_5');



            $t_2 = $request->input('t_2');
            $t_3 = $request->input('t_3');
            $t_4 = $request->input('t_4');
            $t_5 = $request->input('t_5');

            $d_2 = $request->input('d_2');
            $d_3 = $request->input('d_3');
            $d_4 = $request->input('d_4');
            $d_5 = $request->input('d_5');

            $m_2 = $request->input('m_2');
            $m_3 = $request->input('m_3');
            $m_4 = $request->input('m_4');
            $m_5 = $request->input('m_5');

            $s_2 = $request->input('s_2');
            $s_3 = $request->input('s_3');
            $s_4 = $request->input('s_4');
            $s_5 = $request->input('s_5');

//            $costo_2 = $request->input('nptotal_2');
//            $costo_3 = $request->input('nptotal_3');
//            $costo_4 = $request->input('nptotal_4');
//            $costo_5 = $request->input('nptotal_5');

            $utilidad_2 = $request->input('utilidad_2');
            $utilidad_3 = $request->input('utilidad_3');
            $utilidad_4 = $request->input('utilidad_4');
            $utilidad_5 = $request->input('utilidad_5');

//            $pventa2 = $request->input('pventa_2');
//            $pventa3 = $request->input('pventa_3');
//            $pventa4 = $request->input('pventa_4');
//            $pventa5 = $request->input('pventa_5');

            $precio_id_2 = $request->input('precio_id_2');
            $precio_id_3 = $request->input('precio_id_3');
            $precio_id_4 = $request->input('precio_id_4');
            $precio_id_5 = $request->input('precio_id_5');

            if ($star_2=='1') {
                $PrecioPaquete2 = PrecioPaquete::FindOrFail($precio_id_2);
                $PrecioPaquete2->estrellas = 2;
                $PrecioPaquete2->precio_s = $s_2;
                $PrecioPaquete2->personas_s = $acom_s;
                $PrecioPaquete2->precio_m = $m_2;
                $PrecioPaquete2->personas_m = $acom_m;
                $PrecioPaquete2->precio_d = $d_2;
                $PrecioPaquete2->personas_d = $acom_d;
                $PrecioPaquete2->precio_t = $t_2;
                $PrecioPaquete2->personas_t = $acom_t;
                $PrecioPaquete2->utilidad=$utilidad_2;
                $PrecioPaquete2->estado=1;
                $PrecioPaquete2->save();
//                dd('utilidad:'.$utilidad_2.'precio costo:'.$costo_2.'_'.$star_2.'_'.$precio_id_2.'_precios:'.$s_2.'_personass:'.$acom_s.'_preciom:'.$m_2.'_personasm:'.$acom_m.'_preciod:'.$d_2.'_personasd:'.$acom_d.'_preciot:'.$t_2.'_personast:'.$acom_t);
            }

            if ($star_3=='1') {
                $PrecioPaquete3 = PrecioPaquete::FindOrFail($precio_id_3);
                $PrecioPaquete3->estrellas = 3;
                $PrecioPaquete3->precio_s = $s_3;
                $PrecioPaquete3->personas_s = $acom_s;
                $PrecioPaquete3->precio_m = $m_3;
                $PrecioPaquete3->personas_m = $acom_m;
                $PrecioPaquete3->precio_d = $d_3;
                $PrecioPaquete3->personas_d = $acom_d;
                $PrecioPaquete3->precio_t = $t_3;
                $PrecioPaquete3->personas_t = $acom_t;
                $PrecioPaquete3->utilidad=$utilidad_3;
                $PrecioPaquete3->estado=1;
                $PrecioPaquete3->save();
            }
            if ($star_4=='1') {
                $PrecioPaquete4 = PrecioPaquete::FindOrFail($precio_id_4);
                $PrecioPaquete4->estrellas = 4;
                $PrecioPaquete4->precio_s = $s_4;
                $PrecioPaquete4->personas_s = $acom_s;
                $PrecioPaquete4->precio_m = $m_4;
                $PrecioPaquete4->personas_m = $acom_m;
                $PrecioPaquete4->precio_d = $d_4;
                $PrecioPaquete4->personas_d = $acom_d;
                $PrecioPaquete4->precio_t = $t_4;
                $PrecioPaquete4->personas_t = $acom_t;
                $PrecioPaquete4->utilidad=$utilidad_4;
                $PrecioPaquete4->estado=1;
                $PrecioPaquete4->save();
            }
            if ($star_5=='1') {
                $PrecioPaquete5 = PrecioPaquete::FindOrFail($precio_id_5);
                $PrecioPaquete5->estrellas = 5;
                $PrecioPaquete5->precio_s = $s_5;
                $PrecioPaquete5->personas_s = $acom_s;
                $PrecioPaquete5->precio_m = $m_5;
                $PrecioPaquete5->personas_m = $acom_m;
                $PrecioPaquete5->precio_d = $d_5;
                $PrecioPaquete5->personas_d = $acom_d;
                $PrecioPaquete5->precio_t = $t_5;
                $PrecioPaquete5->personas_t = $acom_t;
                $PrecioPaquete5->utilidad=$utilidad_5;
                $PrecioPaquete5->estado=1;
                $PrecioPaquete5->save();
            }
            return redirect(route('admin_proposals_path',$cliente_id));
        }
        catch (\Exception $e) {
            return redirect('admin_proposals_path','1');
        }
    }

    public function guardar_precios_paquete(Request $request){
        try {
//            $cliente_id=$request->input('cliente_id');

            $paquete_id = $request->input('paquete_id1');
            $acom_t = $request->input('acom_t');
            $acom_d = $request->input('acom_d');
            $acom_m = $request->input('acom_m');
            $acom_s = $request->input('acom_s');

            $star_2 = $request->input('vstar_2');
            $star_3 = $request->input('vstar_3');
            $star_4 = $request->input('vstar_4');
            $star_5 = $request->input('vstar_5');



            $t_2 = $request->input('t_2');
            $t_3 = $request->input('t_3');
            $t_4 = $request->input('t_4');
            $t_5 = $request->input('t_5');

            $d_2 = $request->input('d_2');
            $d_3 = $request->input('d_3');
            $d_4 = $request->input('d_4');
            $d_5 = $request->input('d_5');

            $m_2 = $request->input('m_2');
            $m_3 = $request->input('m_3');
            $m_4 = $request->input('m_4');
            $m_5 = $request->input('m_5');

            $s_2 = $request->input('s_2');
            $s_3 = $request->input('s_3');
            $s_4 = $request->input('s_4');
            $s_5 = $request->input('s_5');

//            $costo_2 = $request->input('nptotal_2');
//            $costo_3 = $request->input('nptotal_3');
//            $costo_4 = $request->input('nptotal_4');
//            $costo_5 = $request->input('nptotal_5');

            $utilidad_2 = $request->input('utilidad_2');
            $utilidad_3 = $request->input('utilidad_3');
            $utilidad_4 = $request->input('utilidad_4');
            $utilidad_5 = $request->input('utilidad_5');

//            $pventa2 = $request->input('pventa_2');
//            $pventa3 = $request->input('pventa_3');
//            $pventa4 = $request->input('pventa_4');
//            $pventa5 = $request->input('pventa_5');

//            $precio_id_2 = $request->input('precio_id_2');
//            $precio_id_3 = $request->input('precio_id_3');
//            $precio_id_4 = $request->input('precio_id_4');
//            $precio_id_5 = $request->input('precio_id_5');

//             return dd($star_2);
            if ($star_2=='1') {
                $PrecioPaquete2 = new PPrecio();
                $PrecioPaquete2->estrellas = 2;
                $PrecioPaquete2->precio_s = $s_2;
                $PrecioPaquete2->personas_s = $acom_s;
                $PrecioPaquete2->precio_m = $m_2;
                $PrecioPaquete2->personas_m = $acom_m;
                $PrecioPaquete2->precio_d = $d_2;
                $PrecioPaquete2->personas_d = $acom_d;
                $PrecioPaquete2->precio_t = $t_2;
                $PrecioPaquete2->personas_t = $acom_t;
                $PrecioPaquete2->utilidad=$utilidad_2;
                $PrecioPaquete2->estado=1;
                $PrecioPaquete2->ppaquete_id=$paquete_id;
                $PrecioPaquete2->save();
//                return dd($PrecioPaquete2);
//                dd('utilidad:'.$utilidad_2.'precio costo:'.$costo_2.'_'.$star_2.'_'.$precio_id_2.'_precios:'.$s_2.'_personass:'.$acom_s.'_preciom:'.$m_2.'_personasm:'.$acom_m.'_preciod:'.$d_2.'_personasd:'.$acom_d.'_preciot:'.$t_2.'_personast:'.$acom_t);
            }
//            return dd($PrecioPaquete2);
            if ($star_3=='1') {
                $PrecioPaquete3 = new PPrecio();
                $PrecioPaquete3->estrellas = 3;
                $PrecioPaquete3->precio_s = $s_3;
                $PrecioPaquete3->personas_s = $acom_s;
                $PrecioPaquete3->precio_m = $m_3;
                $PrecioPaquete3->personas_m = $acom_m;
                $PrecioPaquete3->precio_d = $d_3;
                $PrecioPaquete3->personas_d = $acom_d;
                $PrecioPaquete3->precio_t = $t_3;
                $PrecioPaquete3->personas_t = $acom_t;
                $PrecioPaquete3->utilidad=$utilidad_3;
                $PrecioPaquete3->estado=1;
                $PrecioPaquete3->ppaquete_id=$paquete_id;
                $PrecioPaquete3->save();
            }
            if ($star_4=='1') {
                $PrecioPaquete4 = new PPrecio();
                $PrecioPaquete4->estrellas = 4;
                $PrecioPaquete4->precio_s = $s_4;
                $PrecioPaquete4->personas_s = $acom_s;
                $PrecioPaquete4->precio_m = $m_4;
                $PrecioPaquete4->personas_m = $acom_m;
                $PrecioPaquete4->precio_d = $d_4;
                $PrecioPaquete4->personas_d = $acom_d;
                $PrecioPaquete4->precio_t = $t_4;
                $PrecioPaquete4->personas_t = $acom_t;
                $PrecioPaquete4->utilidad=$utilidad_4;
                $PrecioPaquete4->estado=1;
                $PrecioPaquete4->ppaquete_id=$paquete_id;
                $PrecioPaquete4->save();
            }
            if ($star_5=='1') {
                $PrecioPaquete5 = new PPrecio();
                $PrecioPaquete5->estrellas = 5;
                $PrecioPaquete5->precio_s = $s_5;
                $PrecioPaquete5->personas_s = $acom_s;
                $PrecioPaquete5->precio_m = $m_5;
                $PrecioPaquete5->personas_m = $acom_m;
                $PrecioPaquete5->precio_d = $d_5;
                $PrecioPaquete5->personas_d = $acom_d;
                $PrecioPaquete5->precio_t = $t_5;
                $PrecioPaquete5->personas_t = $acom_t;
                $PrecioPaquete5->utilidad=$utilidad_5;
                $PrecioPaquete5->estado=1;
                $PrecioPaquete5->ppaquete_id=$paquete_id;
                $PrecioPaquete5->save();
            }
//            return dd($PrecioPaquete2);

            return redirect(route('current_list_path'));
        }
        catch (\Exception $e) {
            return $e;// redirect('admin_proposals_path','1');
        }
    }
    public function editar_pqt_nuevo(Request $request)
    {
        //
        $codigo_txt=strtoupper($request->input('codigo_txt'));
        $duracion_txt=strtoupper($request->input('duracion_txt'));
        $titulo_txt=strtoupper($request->input('titulo_txt'));
        $descipcion_txt=strtoupper($request->input('descipcion_txt'));
        $opcional_txt=strtoupper($request->input('opcional_txt'));
        $incluye_txt=strtoupper($request->input('incluye_txt'));
        $noincluye_txt=strtoupper($request->input('noincluye_txt'));
        $imagen=strtoupper($request->input('imagen'));
        $path='';
        $paquete_id=$request->input('ppaquete_id');
        $newPaquete= PPaquete::FindOrFail($paquete_id);
        $newPaquete->codigo=$codigo_txt;
        $newPaquete->titulo=$titulo_txt;
        $newPaquete->duracion=$duracion_txt;
        $newPaquete->descripcion=$descipcion_txt;
        $newPaquete->incluye=$incluye_txt;
        $newPaquete->noincluye=$noincluye_txt;
        $newPaquete->opcional=$opcional_txt;
        $newPaquete->imagen=$path;
        $newPaquete->save();
        $paquete = PPaquete::with('precios', 'destinos', 'itinerarios.ordenes')->get()->where('id', $newPaquete->id);
        $destinos = DestinoModelo::get();
        $ordenes1 = OrdenModelo::get();
        $itinerarios = ItinerarioModelo::with('ordenes')->get();
        return view('configurar-itinerario-p', ['destinos' => $destinos, 'paquete' => $paquete, 'ordenes1' => $ordenes1, 'itinerarios' => $itinerarios]);
    }
    public function editar_destinos_paquete(Request $request)
    {
        try {
            $destinos = $request->input('destino');
//          return dd($destinos);
            $paquete_id = $request->input('paquete_id');
//          return dd($paquete_id);
            $antiguos_destinos = PDestino::where('ppaquete_id', $paquete_id)->delete();
            $valor='';
            foreach ($destinos as $destino) {
//              $valor.=$destino.'_';
                $modelo = DestinoModelo::where('destino', $destino)->get();
                foreach ($modelo as $modelo_){
                    $newModelo = new PDestino();
                    $newModelo->codigo = $modelo_->codigo;
                    $newModelo->destino = $modelo_->destino;
                    $newModelo->region = $modelo_->region;
                    $newModelo->pais = $modelo_->pais;
                    $newModelo->descripcion = $modelo_->descripcion;
                    $newModelo->imagen = $modelo_->imagen;
                    $newModelo->estado = $modelo_->estado;
                    $newModelo->ppaquete_id = $paquete_id;
                    $newModelo->save();
                }
//
            }
//            return $valor;
//            return '1_Bien hecho! Destinos editado creectamente';
            $paquete = PPaquete::with('precios', 'destinos', 'itinerarios.ordenes')->get()->where('id', $paquete_id);
            $destinos = DestinoModelo::get();
            $ordenes1 = OrdenModelo::get();

            $itinerarios = ItinerarioModelo::with('ordenes')->get();
            return view('configurar-itinerario-p', ['destinos' => $destinos, 'paquete' => $paquete, 'ordenes1' => $ordenes1, 'itinerarios' => $itinerarios]);

        }
        catch (\Exception $e) {
//            return '0_Ups! Error a editar los destinos, vuelva a intentarlo';
        }
    }
    public function editar_nuevo_itinerario(Request $request)
    {
        try {
            $titulo_txt = $request->input('titulo_txt');
            $descipcion = $request->input('descipcion_txt');
            $itinerario_id = $request->input('itinerario_id');

//            return dd($titulo.'_'.$descipcion.'_'.$itinerario_id);
            $itinerario= PItinerario::FindOrFail($itinerario_id);
            $itinerario->titulo=$titulo_txt;
            $itinerario->descripcion=$descipcion;
            $itinerario->save();
            return '0_1_Bien hecho! observaciones editado creectamente_'.$titulo_txt.'_'.$descipcion.'_'.$itinerario_id;
        }
        catch (\Exception $e) {
            return  $e;
//            return '0_0_Ups! Error a editar el observaciones, vuelva a intentarlo_'.$titulo_txt.'_'.$descipcion.'_'.$itinerario_id;
        }
    }
    public function editar_nuevo_paquete_itinerario_obs(Request $request)
    {
        try {
            $obs = $request->input('obs_txt');
            $itinerario_id = $request->input('itinerario_id');

//            return dd($titulo.'_'.$descipcion.'_'.$itinerario_id);
            $itinerario=PItinerario::FindOrFail($itinerario_id);
            $itinerario->observaciones=$obs;
            $itinerario->save();

            return $itinerario_id.'_1_Bien hecho! Itinerario editado creectamente_'.$obs;
        }
        catch (\Exception $e) {
            return '0_0_Ups! Error a editar el itinerario, vuelva a intentarlo_'.$obs;
        }
    }
    public function borrar_pqt(Request $request)
    {
        //
        $ppaquete_id = $request->input('id');
        $paquete = PPaquete::FindOrFail($ppaquete_id);
        if ($paquete->delete())
            return 1;
        else
            return 0;
    }
    public function editar_nuevo_paquete(Request $request){
        $ppaquete_id = $request->input('ppaquete_id');
        $paquete = PPaquete::with('destinos')->where('id',$ppaquete_id)->get();
        $destinos=DestinoModelo::get();
        return view('editar-nuevo-paquete',['destinos'=>$destinos,'paquetes'=>$paquete]);

    }
    public function editar_pqt2(Request $request)
    {
        //
        $codigo_txt=strtoupper($request->input('codigo_txt'));
        $duracion_txt=strtoupper($request->input('duracion_txt'));
        $titulo_txt=strtoupper($request->input('titulo_txt'));
        $descipcion_txt=strtoupper($request->input('descipcion_txt'));
        $opcional_txt=strtoupper($request->input('opcional_txt'));
        $incluye_txt=strtoupper($request->input('incluye_txt'));
        $noincluye_txt=strtoupper($request->input('noincluye_txt'));
        $imagen=strtoupper($request->input('imagen'));
        $path='';
        $paquete_id=$request->input('ppaquete_id');
        $newPaquete= PPaquete::FindOrFail($paquete_id);
        $newPaquete->codigo=$codigo_txt;
        $newPaquete->titulo=$titulo_txt;
        $newPaquete->duracion=$duracion_txt;
        $newPaquete->descripcion=$descipcion_txt;
        $newPaquete->incluye=$incluye_txt;
        $newPaquete->noincluye=$noincluye_txt;
        $newPaquete->opcional=$opcional_txt;
        $newPaquete->imagen=$path;
        $newPaquete->save();
        $paquete = PPaquete::with('precios', 'destinos', 'itinerarios.ordenes')->get()->where('id', $newPaquete->id);
        $destinos = DestinoModelo::get();
        $ordenes1 = OrdenModelo::get();
        $itinerarios = ItinerarioModelo::with('ordenes')->get();
        return view('configurar-itinerario-p-editar', ['destinos' => $destinos, 'paquete' => $paquete, 'ordenes1' => $ordenes1, 'itinerarios' => $itinerarios]);

    }
    public function editar_destinos_paquete2(Request $request)
    {
        try {
            $destinos = $request->input('destino');
//          return dd($destinos);
            $paquete_id = $request->input('paquete_id');
//          return dd($paquete_id);
            $antiguos_destinos = PDestino::where('ppaquete_id', $paquete_id)->delete();
            $valor='';
            foreach ($destinos as $destino) {
//              $valor.=$destino.'_';
                $modelo = DestinoModelo::where('destino', $destino)->get();
                foreach ($modelo as $modelo_){
                    $newModelo = new PDestino();
                    $newModelo->codigo = $modelo_->codigo;
                    $newModelo->destino = $modelo_->destino;
                    $newModelo->region = $modelo_->region;
                    $newModelo->pais = $modelo_->pais;
                    $newModelo->descripcion = $modelo_->descripcion;
                    $newModelo->imagen = $modelo_->imagen;
                    $newModelo->estado = $modelo_->estado;
                    $newModelo->ppaquete_id = $paquete_id;
                    $newModelo->save();
                }
//
            }
//            return $valor;
//            return '1_Bien hecho! Destinos editado creectamente';
            $paquete = PPaquete::with('precios', 'destinos', 'itinerarios.ordenes')->get()->where('id', $paquete_id);
            $destinos = DestinoModelo::get();
            $ordenes1 = OrdenModelo::get();

            $itinerarios = ItinerarioModelo::with('ordenes')->get();
            return view('configurar-itinerario-p-editar', ['destinos' => $destinos, 'paquete' => $paquete, 'ordenes1' => $ordenes1, 'itinerarios' => $itinerarios]);

        }
        catch (\Exception $e) {
//            return '0_Ups! Error a editar los destinos, vuelva a intentarlo';
        }
    }
}
