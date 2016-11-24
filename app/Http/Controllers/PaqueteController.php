<?php

namespace GotoPeru\Http\Controllers;
use GotoPeru\PaquetePersonalizado;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    //
    public function buscar(Request $request)
    {
        $codigo=$request->input('codigo');

        $paquete=PaquetePersonalizado::with('itinerario_personalizados.servicios','itinerario_personalizados.itinerario_x_horas')->get()->where('codigo',$codigo);
//
//        return view('show_paquete')->with('paquete',$paquete);
    return dd($paquete);

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
}
