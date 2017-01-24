<?php

namespace GotoPeru\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function cotizaciones(){
        return view('cotizaciones');
    }
}
