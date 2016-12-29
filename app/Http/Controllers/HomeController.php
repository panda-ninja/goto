<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\Cotizacion;
use GotoPeru\ItinerarioPersonalizado;
use GotoPeru\ItinerarioXHora;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\TPaquete_servicio_extra;
use GotoPeru\TCategoria;
use GotoPeru\TPaquete;
//use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use GotoPeru\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes')->get()->where('estado', 1);
        $featured = TPaquete::with('paquetes_destinos', 'precio_paquetes')->get()->where('estadoslider', 1);
//        dd($paquete);
        return view('home', ['paquete'=>$paquete, 'featured'=>$featured]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdate($titulo, $dias)
    {

//        if ($_POST){
//            Session::put('s_date', Input::get('txt_date'));
//            Session::put('s_country', Input::get('txt_country'));
//        }

        $title = str_replace('-', ' ', $titulo);
        $paquete = TPaquete::with('itinerario','paquetes_destinos', 'precio_paquetes')->get()->where('titulo', $title);
//        dd($paquete);

        return view('travel-package', ['paquetes'=>$paquete]);
    }
    public function checkout(Request $request,$titulo, $dias)
    {
        $title = str_replace('-', ' ', $titulo);
        $codigo=strtoupper($request->input('txt_code'));
        $date=strtoupper($request->input('txt_date'));

        $paquete = TPaquete::with('itinerario','paquetes_destinos', 'precio_paquetes')->get()->where('titulo', $title);
//        dd($paquete);
        return view('checkout-package', ['paquetes'=>$paquete]);
    }

    public function showcheckout(Request $request,$titulo)
    {
        $title = str_replace('-', ' ', $titulo);
        $txt_price=($request->input('txt_price'));
        $txt_date_number=($request->input('txt_date_number'));
        $txt_country=($request->input('txt_country'));
//        dd($txt_price);
        $paquete = TPaquete::with(['itinerario','paquetes_destinos', 'precio_paquetes','paquete_servicio_extra.servicio_extra','disponibilidad' => function($query)use($txt_date_number){$query->where('fecha_disponibilidad',$txt_date_number);}])
            ->get()
            ->where('titulo', $title);
//       dd($paquete);

        return view('checkout', ['paquetes'=>$paquete,'precio'=>$txt_price,'datedispo'=>$txt_date_number,'country'=>$txt_country]);
    }

    public function viewpackages()
    {
        $categoria = TCategoria::get();
        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes', 'paquetes_categoria')->where('codigo', 'NOT LIKE', 'GTPF%')->where('codigo', 'NOT LIKE', 'GTPX%')->where('codigo', 'NOT LIKE', 'GTPV%')->get();
//        dd($categoria);
        return view('ground', ['paquete'=>$paquete, 'categoria'=>$categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function guardarUsuario()
    {
        $user = Cotizacion::create(['nropersonas' => '10']);

        $user->save();

        return $user;
    }
}
