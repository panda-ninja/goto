<?php

namespace GotoPeru\Http\Controllers;
use GotoPeru\DestinoCotizacion;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\TDestino;
use GotoPeru\TItinerario;
use GotoPeru\TPaquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PaqueteController extends Controller
{
    public function autocomplete(Request $request)
    {
        $codigo=strtoupper($request->term);
        $paquete = TPaquete::where('codigo','like','%'.$codigo.'%')->get();
        $result=array();
        foreach ($paquete as $pqt){
            $result[]=['id'=>$pqt->id,'value'=>$pqt->codigo];
        }
        return response()->json($result);
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
