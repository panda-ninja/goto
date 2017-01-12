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
use Illuminate\Support\Facades\Mail;
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
        $paquete2 = TPaquete::with('paquetes_destinos', 'precio_paquetes', 'disponibilidad')->where('estadoslider',2)->get();
//        dd($paquete2);
        return view('home', ['paquete'=>$paquete, 'featured'=>$featured, 'duracion'=>$duracion, 'paquetes2'=>$paquete2]);
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

    public function inquire()
    {

        $from = 'hidalgochpnce@gmail.com';

        $name = $_GET['name_txt'];
        $email = $_GET['email_txt'];
        $telephone = $_GET['phone_txt'];
        $comment = $_GET['comment_txt'];

//        return $name;

        try {
            Mail::send(['html' => 'inquire_notification'], ['name' => $name], function ($messaje) use ($email, $name) {
                $messaje->to($email, $name)
                    ->subject('Menssage GotoPeru')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru');
            });


            Mail::send(['html' => 'inquire_notifications_admin'], ['name' => $name, 'email' => $email, 'telephone' => $telephone, 'comment' => $comment], function ($messaje) use ($from) {
                $messaje->to($from, 'GotoPeru')
                    ->subject('Menssage GotoPeru.Travel')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru.Travel');
            });


//            Session::flash('message', $name.' hola');

            return 'THANK YOU FOR CONTACT US, YOU WILL RECEIVE A REPLY IN LESS THAN 24 HOURS, GURANTEE. :)';


//            return redirect()->route('home_path');
        }
        catch (Exception $e){
            return $e;
        }

    }

    public function availability()
    {
        if (isset($_GET['accommodations_opt'])){
            $accommodations2 = $_GET['accommodations_opt'];
        }else{
            $accommodations2 = "-";
        }

        $from = 'hidalgochpnce@gmail.com';

        $code = $_GET['code_txt'];
        $name = $_GET['name_txt'];
        $last_name = $_GET['last_name_txt'];
        $email = $_GET['email_txt'];
        $telephone = $_GET['phone_txt'];
        $date = $_GET['date_txt'];
        $group_size = $_GET['group_size_slc'];
        $accommodations = $accommodations2;
        $departure_date = $_GET['departure_date_slc'];
        $comments = $_GET['comments_txt'];



//        return $name;

        try {
            Mail::send(['html' => 'inquire_notification'], ['name' => $name], function ($messaje) use ($email, $name) {
                $messaje->to($email, $name)
                    ->subject('Menssage GotoPeru')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru');
            });


            Mail::send(['html' => 'availability_notifications'], [
                'code' => $code,
                'name' => $name,
                'last_name' => $last_name,
                'email' => $email,
                'telephone' => $telephone,
                'date' => $date,
                'group_size' => $group_size,
                'accommodations' => $accommodations,
                'departure_date' => $departure_date,
                'comments' => $comments

            ], function ($messaje) use ($from) {
                $messaje->to($from, 'GotoPeru')
                    ->subject('Menssage GotoPeru.Travel')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru.Travel');
            });


//            Session::flash('message', $name.' hola');

            return 'THANK YOU FOR CONTACT US, YOU WILL RECEIVE A REPLY IN LESS THAN 24 HOURS, GURANTEE. :)';


//            return redirect()->route('home_path');
        }
        catch (Exception $e){
            return $e;
        }

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
    public function showdate($dias)
    {

//        if ($_POST){
//            Session::put('s_date', Input::get('txt_date'));
//            Session::put('s_country', Input::get('txt_country'));
//        }
        $paquete2 = TPaquete::with('paquetes_destinos', 'precio_paquetes', 'disponibilidad')->where('estadoslider',2)->where('duracion',$dias)->get();
        $paquete = TPaquete::with('itinerario','paquetes_destinos', 'precio_paquetes')->get();
//        dd($paquete);

        return view('travel-package', ['paquetes'=>$paquete, 'paquetes2'=>$paquete2]);
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
