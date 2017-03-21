<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\ItinerarioModelo;
use GotoPeru\OrdenModelo;
use Illuminate\Http\Request;
use GotoPeru\ItinerarioOrdenModelo;

class ItinerarioModelocontroller extends Controller
{
    //
    public function ListarItineraios(){
        $itinerarioModelo=ItinerarioModelo::with('itinerarios.ordenes')->get();
        return view();
    }
}
