<?php

namespace GotoPeru\Http\Controllers;
use GotoPeru\Cliente;
use GotoPeru\Cotizacion;
use GotoPeru\DestinoCotizacion;
use GotoPeru\DestinoModelo;
use GotoPeru\DestinoPaqueteCotizacion;
use GotoPeru\ItinerarioModelo;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\PDestino;
use GotoPeru\PItinerario;
use GotoPeru\PItinerarioOrden;
use GotoPeru\PPrecio;
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
                $new_precio=new PPrecio();
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
                $new_precio->ppaquete_id=$new_paquete->id;
                $new_precio->save();
            }
            foreach ($paquete->destinos as $destino){
                $new_destino=new PDestino();
                $new_destino->codigo=$destino->codigo;
                $new_destino->destino=$destino->destino;
                $new_destino->region=$destino->region;
                $new_destino->pais=$destino->pais;
                $new_destino->descripcion=$destino->descripcion;
                $new_destino->imagen=$destino->imagen;
                $new_destino->estado=$destino->estado;
                $new_destino->ppaquete_id=$new_paquete->id;
                $new_destino->save();
            }
            foreach ($paquete->itinerarios as $itinerario){
                $new_itinerario=new PItinerario();
                $new_itinerario->titulo=$itinerario->titulo;
                $new_itinerario->descripcion=$itinerario->descripcion;
                $new_itinerario->dias=$itinerario->dias;
                $new_itinerario->fecha=$itinerario->fecha;
                $new_itinerario->precio=$itinerario->precio;
                $new_itinerario->imagen=$itinerario->imagen;
                $new_itinerario->estado=$itinerario->estado;
                $new_itinerario->ppaquete_id=$new_paquete->id;
                $new_itinerario->save();

                foreach ($itinerario->ordenes as $orden){
                    $new_orden = new PItinerarioOrden();
                    $new_orden->nombre=$orden->nombre;
                    $new_orden->observacion=$orden->observacion;
                    $new_orden->precio=$orden->precio;
                    $new_orden->pitinerario_id=$new_itinerario->id;
                    $new_orden->save();
                }
            }
        }
        $paquete = PaqueteCotizacion::with('precio_paquetes','destinos','itinerario_cotizaciones')->get()->where('id',$new_paquete->id);
        $destinos=DestinoModelo::get();
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
}
