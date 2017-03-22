<?php

namespace GotoPeru\Http\Controllers;
use GotoPeru\Cliente;
use GotoPeru\Cotizacion;
use GotoPeru\DestinoCotizacion;
use GotoPeru\DestinoPaqueteCotizacion;
use GotoPeru\ItinerarioModelo;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\TDestino;
use GotoPeru\TPaqueteDestino;
use GotoPeru\TItinerario;
use GotoPeru\TPaquete;
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
        $paquete = TPaquete::with('paquetes_destinos.destinos', 'precio_paquetes', 'itinerario')->get()->where('codigo', $codigo[0]);
//        dd($paquete);
        $destino = TDestino::all();
        $id = TPaquete::where('codigo', $codigo[0])->get();
//        dd($id[0]->id);
        $destino_paquete = TPaqueteDestino::with('destinos')->where('idpaquetes', $id[0]->id)->get();
//        dd($destino_paquete);
//        $itinerarios=ItinerarioModelo::with('itinerarios')->get();
        /*-- guardamos el plan + los destinos*/
        foreach ($paquete as $pqt1) {
            $pqt = new PaqueteCotizacion();
            $pqt->codigo = $codigo[0];
            $pqt->titulo = $pqt1->titulo;
            $pqt->duracion = $pqt1->duracion;
            $pqt->preciocosto = $pqt1->preciocosto;
            $pqt->descripcion = $pqt1->descripcion;
            $pqt->incluye = $pqt1->incluye;
            $pqt->noincluye = $pqt1->noincluye;
            $pqt->opcional = $pqt1->opcional;
            $pqt->imagen = $pqt1->imagen;
            $pqt->estado = $pqt1->estado;
            $pqt->cotizaciones_id = $cotizacion_id;
            $pqt->save();
        }
        /*-- guardamos los destinos*/
        dd($destino_paquete);
        foreach ($destino_paquete as $destino1) {
        foreach ($destino1 as $destino) {

            $destino_coti = new DestinoCotizacion();
            $destino_coti->codigo = $destino->codigo;
            $destino_coti->nombre = $destino->nombre;
            $destino_coti->region = $destino->region;
            $destino_coti->pais = $destino->pais;
            $destino_coti->descripcion = $destino->descripcion;
            $destino_coti->imagen = $destino->imagen1;
            $destino_coti->estado = '1';
            $destino_coti->paquete_cotizaciones_id = $pqt->id;
            $destino_coti->save();
            $destino_modelo = DestinoModelo::where('nombre', $destino->nombre)->get();
            if (count($destino_modelo) == 0) {
                $destino_modelo1 = new DestinoModelo();
                $destino_modelo1->codigo = $destino->codigo;
                $destino_modelo1->nombre = $destino->nombre;
                $destino_modelo1->region = $destino->region;
                $destino_modelo1->pais = $destino->pais;
                $destino_modelo1->descripcion = $destino->descripcion;
                $destino_modelo1->imagen = $destino->imagen1;
                $destino_modelo1->estado = '1';
                $destino_modelo1->save();
            }

        }
    }
        $destino_modelo=DestinoModelo::get();
        $destino_cotizacion=DestinoCotizacion::where('paquete_cotizaciones_id',$pqt->id)->get();
        return view('configurar_paquete_plan',['destino_cotizacion'=>$destino_cotizacion,'cotizacion'=>$cotizacion_,'cotizacion_id'=>$cotizacion_id,'cliente'=>$cliente_,'paquete'=>$pqt,'destino_modelo'=>$destino_modelo/*,'itinerarios'=>$itinerarios*/]);
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
