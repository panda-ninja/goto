<?php

namespace GotoPeru\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use GotoPeru\Cotizacion;
use GotoPeru\ItinerarioPersonalizado;
use GotoPeru\ItinerarioXHora;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\ServicioExtra;

use GotoPeru\TCountry;
use GotoPeru\TState;
use GotoPeru\TCity;

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
        SEOMeta::setTitle('Travel Packages to Peru | Peru Vacations | Machu Picchu Travel');
        SEOMeta::setDescription('Want to travel to Peru? GoToPeru offers a variety travel packages all over Peru. Call one of our offices today to start planning your Machu Picchu trip!');
        SEOMeta::setCanonical('https://gotoperu.com/');
        SEOMeta::addKeyword(['peru travel packages', 'travel packages to peru', 'Go To Peru', 'machu picchu travel', 'peru vacations', 'peru vacation packages', 'machu picchu deals', 'peru travel offers', 'machu picchu travel offers', 'Machu Picchu packages', 'customize peru travel packages', 'tour packages to machu picchu']);


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

        $from = 'info@gotoperu.com';

        $name = $_GET['name_txt'];
        $email = $_GET['email_txt'];
        $telephone = $_GET['phone_txt'];
        $comment = $_GET['comment_txt'];

//        return $name;

        try {
            Mail::send(['html' => 'inquire_notification'], ['name' => $name], function ($messaje) use ($email, $name) {
                $messaje->to($email, $name)
                    ->subject('Inquire GotoPeru')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru');
            });


            Mail::send(['html' => 'inquire_notifications_admin'], ['name' => $name, 'email' => $email, 'telephone' => $telephone, 'comment' => $comment], function ($messaje) use ($from) {
                $messaje->to($from, 'GotoPeru')
                    ->subject('Inquire GotoPeru.Travel')
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

        $from = 'info@gotoperu.com';

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
                    ->subject('Inquire GotoPeru')
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
                    ->subject('Inquire GotoPeru.Travel')
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

    public function design()
    {
        $from = 'info@gotoperu.com';

        $peru = $_GET['txt_peru'];
        $multicountries = $_GET['txt_multicountries'];
        $hotel = $_GET['txt_hotel'];
        $trip = $_GET['txt_trip'];
        $travelers = $_GET['txt_travelers'];

        $name = $_GET['txt_name'];
        $email = $_GET['txt_email'];
        $telephone = $_GET['txt_telephone'];
        $travel_date = $_GET['txt_travel_date'];
        $comment = $_GET['txt_comment'];

        try {
            Mail::send(['html' => 'inquire_notification'], ['name' => $name], function ($messaje) use ($email, $name) {
                $messaje->to($email, $name)
                    ->subject('Inquire GotoPeru')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru');
            });


            Mail::send(['html' => 'notifications_design'], [
                'peru' => $peru,
                'multicountries' => $multicountries,
                'hotel' => $hotel,
                'trip' => $trip,
                'travelers' => $travelers,
                'name' => $name,
                'email' => $email,
                'telephone' => $telephone,
                'travel_date' => $travel_date,
                'comment' => $comment
            ], function ($messaje) use ($from) {
                $messaje->to($from, 'GotoPeru')
                    ->subject('Inquire GotoPeru.Travel')
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
        SEOMeta::setTitle('Travel Packages All Included | Customized Peru Travel Packages');
        SEOMeta::setDescription('Discover beautiful places to visit in Peru Machu Picchu tours with gotoperu. Experience best places in Peru- Ica and Vineyards, Mancora Beach, Nazca Lines and more.');
        SEOMeta::setCanonical('http://goto2.nu/travel-packages-all-included/');
        SEOMeta::addKeyword(['Customized Peru travel Packages', 'Peru Travel', 'Peru Travel Destinations', 'Peru Travel Packages']);

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
        SEOMeta::setTitle('Machu Picchu Tour Packages | Machu Picchu Vacation Packages | Machu Picchu Deals | Peru Honeymoon Travel Packages');
        SEOMeta::setDescription('Discover Peru with Gotoperu Tour &amp; Travel Packages. We offer amazing deals on Machu Picchu Vacation Packages.');
        SEOMeta::setCanonical('https://gotoperu.com/packages/');
        SEOMeta::addKeyword(['Machu Picchu Tour Packages', 'Machu Picchu Packages', 'Machu Picchu Vacation Packages', 'Machu Picchu Deals', 'Peru Honeymoon Travel Packages']);

        $title = str_replace('-', ' ', strtoupper($titulo));
        $txt_price=0;
        if(!empty($request->input('txt_date'))) {
            $date_precio = explode('_', $request->input('txt_date'));

            $txt_date_number = '';
            if (count($date_precio) > 1) {
                $txt_price = $date_precio[1];
                $txt_date_number = $date_precio[0];
            } else {
                $txt_price = $request->input('txt_price');
                $txt_date_number = $request->input('txt_date');
            }
        }
        else {
            $txt_price = $request->input('txt_price');
            $txt_date_number = $request->input('txt_date');
        }

//        $txt_date_number=($request->input('txt_date'));
//        $txt_country=($request->input('txt_country'));
        $txt_country=($request->input('txt_country'));
        $dias=($request->input('dias'));

//        dd($txt_price);
        $paquete = TPaquete::with(['itinerario','paquetes_destinos', 'precio_paquetes','paquete_servicio_extra','disponibilidad' => function($query)use($txt_date_number){$query->where('fecha_disponibilidad',$txt_date_number);}])
            ->get()
            ->where('titulo', $txt_country)
            ->where('duracion', $dias);


        $servicio_extra=ServicioExtra::get();
        $country=TCountry::get();
        $state=TState::where('country_id','231')->get();
        $city=TCity::where('state_id','3930')->get();
        $paqueteCombo = TPaquete::with('disponibilidad')->where('codigo','GTPF700')->orwhere('codigo','GTPF701')->orwhere('codigo','GTPF702')->orwhere('codigo','GTPF703')
            ->where('duracion', $dias)
            ->get();
//        dd($txt_date_number,$paqueteCombo);
        return view('checkout', ['servicio_extras'=>$servicio_extra,'paqueteCombo'=>$paqueteCombo,'paquetes'=>$paquete,'precio'=>$txt_price,'datedispo'=>$txt_date_number,'country'=>$title,'country1'=>$country, 'state'=>$state,'city'=>$city]);
    }
    public function showcheckout1(Request $request1,$titulo)
    {
//        return redirect()->route('home_path');
        return view('home');

    }
    public function viewpackages()
    {
        SEOMeta::setTitle('Machu Picchu Tour Packages | Machu Picchu Vacation Packages | Machu Picchu Deals | Peru Honeymoon Travel Packages');
        SEOMeta::setDescription('Discover Peru with Gotoperu Tour &amp; Travel Packages. We offer amazing deals on Machu Picchu Vacation Packages.');
        SEOMeta::setCanonical('https://gotoperu.com/packages/');
        SEOMeta::addKeyword(['Machu Picchu Tour Packages', 'Machu Picchu Packages', 'Machu Picchu Vacation Packages', 'Machu Picchu Deals', 'Peru Honeymoon Travel Packages']);

        $categoria = TCategoria::get();
        $duracion = TPaquete::select('duracion')->distinct()->get();
        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes', 'paquetes_categoria')->where('codigo', 'NOT LIKE', 'GTPF%')->where('codigo', 'NOT LIKE', 'GTPX%')->where('codigo', 'NOT LIKE', 'GTPV%')->get();
//        dd($duracion );
        return view('ground', ['paquete'=>$paquete, 'categoria'=>$categoria, 'duracion'=>$duracion]);
    }

    public function showdays($dias)
    {
        SEOMeta::setTitle('Travel Packages '.$dias.' days - Peru Travel Packages | Machu Picchu Tour Packages');
        SEOMeta::setDescription('Travel Packages '.$dias.' days. Discover Peru with Gotoperu Tour &amp; Travel Packages. We offer amazing deals on Machu Picchu Vacation Packages.');
        SEOMeta::setCanonical('http://goto2.nu/travel-packages/');
        SEOMeta::addKeyword(['Machu Picchu Tour Packages', 'Machu Picchu Packages', 'Machu Picchu Vacation Packages', 'Machu Picchu Deals', 'Peru Honeymoon Travel Packages']);

        $categoria = TCategoria::get();
        $duracion = TPaquete::select('duracion')->distinct()->get();
        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes', 'paquetes_categoria')->where('codigo', 'NOT LIKE', 'GTPF%')->where('codigo', 'NOT LIKE', 'GTPX%')->where('codigo', 'NOT LIKE', 'GTPV%')->where('duracion', $dias)->get();
//        dd($paquete );
        return view('ground', ['paquete'=>$paquete, 'categoria'=>$categoria, 'duracion'=>$duracion]);

    }

    public function showcategory($category)
    {
        SEOMeta::setTitle('Peru Tour Packages by Category | Peru  '.ucwords(strtolower($category)).'');
        SEOMeta::setDescription('Discover beautiful places to visit in Peru Machu Picchu tours with gotoperu. Experience best places in Peru- Ica and Vineyards, Mancora Beach, Nazca Lines and more.');
        SEOMeta::setCanonical('http://goto2.nu/travel-packages/');
        SEOMeta::addMeta('article:section', 'Peru '.ucwords(strtolower($category)).' Travel Packages', 'property');
        SEOMeta::addKeyword(['Peru '.ucwords(strtolower($category)).' Travel Packages','Machu Picchu Tour Packages', 'Machu Picchu Packages', 'Machu Picchu Vacation Packages', 'Machu Picchu Deals']);

//        SEOMeta::setTitle($post->title);
//        SEOMeta::setDescription($post->resume);
//        SEOMeta::addMeta('article:published_time', $post->published_date->toW3CString(), 'property');
//        SEOMeta::addMeta('article:section', $post->category, 'property');
//        SEOMeta::addKeyword(['key1', 'key2', 'key3']);

        $duracion = TPaquete::select('duracion')->distinct()->get();
        $categoria = TPaqueteCategoria::with(['categoria'=>function($query) use ($category) { $query->where('nombre', $category);}])->get();
//        dd($categoria );

        return view('category', ['categoria'=>$categoria, 'duracion'=>$duracion]);
    }

    public function showpackages($titulo, $dias)
    {
        $title = str_replace('-', ' ', strtoupper($titulo));

        SEOMeta::setTitle('Travel Packages: '.ucwords(strtolower($title)).' | GotoPeru');
        SEOMeta::setDescription('Want to travel to Peru? GoToPeru offers a variety travel packages all over Peru. Call one of our offices today to start planning your Machu Picchu trip!');
        SEOMeta::setCanonical('https://gotoperu.com/packages/');
        SEOMeta::addKeyword(['peru travel packages', 'cusco tours', 'travel packages to peru', 'peru vacations', 'peru vacation packages', 'machu picchu deals', 'peru travel offers', 'machu picchu travel offers', 'Machu Picchu packages', 'customize peru travel packages']);


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
