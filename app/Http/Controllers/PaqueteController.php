<?php

namespace GotoPeru\Http\Controllers;
use GotoPeru\Cliente;
use GotoPeru\Cotizacion;
use GotoPeru\DestinoCotizacion;
use GotoPeru\ItinerarioModelo;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\TDestino;
use GotoPeru\TItinerario;
use GotoPeru\TPaquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PaqueteController extends Controller
{
    public function buscar_plan(Request $request){
        $cotizacion_id=$request->input('cotizacion_id');
        $cliente_id=$request->input('cliente_id');
        $cliente_=Cliente::FindOrFail($cliente_id);
        $cotizacion_=Cotizacion::FindOrFail($cotizacion_id);


        $codigo=explode(' ',strtoupper($request->input('codigo')));
        $paquete = TPaquete::with('paquetes_destinos.destinos', 'precio_paquetes','itinerario')->get()->where('codigo',$codigo[0]);
        $destino=TDestino::all();
//        $itinerarios=ItinerarioModelo::with('itinerarios')->get();
        return view('configurar_paquete_plan',['cotizacion'=>$cotizacion_,'cliente'=>$cliente_,'paquete'=>$paquete,'destino'=>$destino/*,'itinerarios'=>$itinerarios*/]);
    }
    public function autocompletecodigo(Request $request)
    {
        if ($request->ajax()) {
            $results = [];
            $codigo=strtoupper($request->input('codigo'));
            $paquete = TPaquete::where('codigo', 'like', '%'.$codigo.'%')
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
