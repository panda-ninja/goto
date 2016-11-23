<?php

namespace GotoPeru\Http\Controllers;
use GotoPeru\PaquetePersonalizado;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    //
    public function buscar(Request $request)
    {
        //
        if($request->ajax()){
            $paquete=PaquetePersonalizado::findOrFail($request->codigo);
//            dd($paquete);
            if($paquete){
                return Response($paquete);
            }
        }
    }
}
