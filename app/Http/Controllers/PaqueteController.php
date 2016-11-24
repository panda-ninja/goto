<?php

namespace GotoPeru\Http\Controllers;
use GotoPeru\PaquetePersonalizado;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    //
    public function buscar(Request $request)
    {
//        $codigo=$request->input('codigo');
//        $paquete=PaquetePersonalizado::where('codigo',$codigo);
        return 'holaaaaaaaaaaaaaaaa';


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
