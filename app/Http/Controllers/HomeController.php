<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\Cotizacion;
use GotoPeru\ItinerarioPersonalizado;
use GotoPeru\ItinerarioXHora;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\TPaquete_servicio_extra;
use GotoPeru\TCategoria;
use GotoPeru\TDisponibilidad;
use GotoPeru\TPaquete;

use GotoPeru\TPaqueteCategoria;
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
        $duracion = TPaquete::select('duracion')->distinct()->get();
        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes', 'disponibilidad')->get()->where('estado', 1);
        $featured = TPaquete::with('paquetes_destinos', 'precio_paquetes')->get()->where('estadoslider', 1);
        $disponibilidad7 = TPaquete::with('disponibilidad')->where('codigo','GTPF700')->orwhere('codigo','GTPF701')->orwhere('codigo','GTPF702')->get();
        $disponibilidad5 = TPaquete::with('disponibilidad')->where('codigo','GTPF500')->orwhere('codigo','GTPF501')->orwhere('codigo','GTPF502')->orwhere('codigo','GTPF503')->get();
//        dd($disponibilidad);
        return view('home', ['paquete'=>$paquete, 'featured'=>$featured, 'duracion'=>$duracion, 'disponibilidad7'=>$disponibilidad7, 'disponibilidad5'=>$disponibilidad5]);
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
        $disponibilidad = TPaquete::with('disponibilidad')->where('codigo','GTPF700')->orwhere('codigo','GTPF701')->orwhere('codigo','GTPF702')->get();
        $title = str_replace('-', ' ', strtoupper($titulo));
        $paquete = TPaquete::with('itinerario','paquetes_destinos', 'precio_paquetes')->where('titulo', $title)->where('duracion', $dias)->get();
//        dd($paquete);

        return view('travel-package', ['paquetes'=>$paquete, 'disponibilidad'=>$disponibilidad]);
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
        $title = str_replace('-', ' ', strtoupper($titulo));
        $txt_price=($request->input('txt_price'));
        $txt_date_number=($request->input('txt_date_number'));
        $txt_country=($request->input('txt_country'));
//        dd($txt_price);
        $paquete = TPaquete::with(['itinerario','paquetes_destinos', 'precio_paquetes','paquete_servicio_extra.servicio_extra','disponibilidad' => function($query)use($txt_date_number){$query->where('fecha_disponibilidad',$txt_date_number);}])
            ->get()
            ->where('titulo', $title);
//       dd($paquete);

        return view('checkout', ['paquetes'=>$paquete,'precio'=>$txt_price,'datedispo'=>$txt_date_number,'country'=>$title]);
    }

    public function viewpackages()
    {
        $categoria = TCategoria::get();
        $duracion = TPaquete::select('duracion')->distinct()->get();
        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes', 'paquetes_categoria')->where('codigo', 'NOT LIKE', 'GTPF%')->where('codigo', 'NOT LIKE', 'GTPX%')->where('codigo', 'NOT LIKE', 'GTPV%')->get();
//        dd($duracion );
        return view('ground', ['paquete'=>$paquete, 'categoria'=>$categoria, 'duracion'=>$duracion]);
    }

    public function showdays($dias)
    {
        $categoria = TCategoria::get();
        $duracion = TPaquete::select('duracion')->distinct()->get();
        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes', 'paquetes_categoria')->where('codigo', 'NOT LIKE', 'GTPF%')->where('codigo', 'NOT LIKE', 'GTPX%')->where('codigo', 'NOT LIKE', 'GTPV%')->where('duracion', $dias)->get();
//        dd($paquete );
        return view('ground', ['paquete'=>$paquete, 'categoria'=>$categoria, 'duracion'=>$duracion]);
    }

    public function showcategory($category)
    {
        $duracion = TPaquete::select('duracion')->distinct()->get();
        $categoria = TPaqueteCategoria::with(['categoria'=>function($query) use ($category) { $query->where('nombre', $category);}])->get();
//        dd($categoria );

        return view('category', ['categoria'=>$categoria, 'duracion'=>$duracion]);
    }

    public function showpackages($titulo, $dias)
    {


        $title = str_replace('-', ' ', strtoupper($titulo));
        $paquete = TPaquete::with('itinerario','paquetes_destinos', 'precio_paquetes')->get()->where('titulo', $title);
//        dd($paquete);
        return view('detail-program', ['paquetes'=>$paquete]);
    }

    public function pdf($id)
    {
        $paquete = TPaquete::with('itinerario','paquetes_destinos', 'precio_paquetes')->get()->where('id', $id);
//        dd($paquete);
        $pdf = \PDF::loadView('vacations_pdf', ['paquete'=>$paquete])->setPaper('a4')->setWarnings(true);
        return $pdf->download('itinerary.pdf');

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
