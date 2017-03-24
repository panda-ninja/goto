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
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\PDestino;
use GotoPeru\PItinerario;
use GotoPeru\PItinerarioOrden;
use GotoPeru\PPrecio;
use GotoPeru\PrecioPaquete;
use GotoPeru\TDestino;
use GotoPeru\TPaqueteDestino;
use GotoPeru\TItinerario;
use GotoPeru\TPaquete;
use GotoPeru\PPaquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PaqueteController extends Controller
{
    public function buscar_plan(Request $request)
    {
        $cotizacion_id = $request->input('cotizacion_id');
        $cliente_id = $request->input('cliente_id');
        $cliente_ = Cliente::FindOrFail($cliente_id);
        $cotizacion_ = Cotizacion::FindOrFail($cotizacion_id);

        $codigo = explode(' ', strtoupper($request->input('codigo')));
        $ppaquete = PPaquete::with('precios','destinos','itinerarios')->get()->where('codigo', $codigo[0]);
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
        $paquete = PaqueteCotizacion::with('precio_paquetes','destinos','itinerario_cotizaciones')->get()->where('id',$new_paquete->id);
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
            $titulo = $request->input('titulo_txt');
            $descipcion = $request->input('descipcion_txt');
            $itinerario_id = $request->input('itinerario_id');

            $itinerario=ItinerarioCotizacion::FindOrFail($itinerario_id);
            $itinerario->titulo=$titulo;
            $itinerario->descripcion=$descipcion;
            $itinerario->save();

            return $itinerario_id.'_1_Bien hecho! Itinerario editado creectamente';
        }
        catch (\Exception $e) {
            return $itinerario_id.'_0_Ups! Error a editar el itinerario, vuelva a intentarlo';
        }
    }



}
