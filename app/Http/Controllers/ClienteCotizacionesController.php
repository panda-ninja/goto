<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\Cliente;
use GotoPeru\ClienteCotizacion;
use GotoPeru\Cotizacion;
use GotoPeru\PaqueteCotizacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ClienteCotizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $idCliente=auth()->guard('cliente')->user()->id;
        $cotizaciones = Cotizacion::with(['cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente)->where('estado', 1);}])
            ->get()
            ->sortByDesc('fecha');

        $clienteCotizacion = ClienteCotizacion::with('cliente')->get()
            ->where('cotizaciones_id', $id)
        ->sortByDesc('estado');

        $clienteCotizacion_num = $clienteCotizacion->count();

        $cliente_estado = ClienteCotizacion::with('cliente')->get()
            ->where('cotizaciones_id', $id)
            ->where('clientes_id', $idCliente)
            ->where('estado', 1)
            ->sortByDesc('estado');
        $cliente_estado = $cliente_estado->count();
//        dd($cliente_estado);

        $paquetes_num = PaqueteCotizacion::with(['cotizaciones.cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])->get();

        return view('groups', ['cotizaciones'=>$cotizaciones, 'paquetes_num'=>$paquetes_num, 'clienteCotizacion'=>$clienteCotizacion, 'clienteCotizacion_num'=>$clienteCotizacion_num, 'cliente_estado'=>$cliente_estado, 'idCliente'=>$idCliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
//        $validator = Validator::make($request->all(), [
//            'nombres' => 'required',
//            'email' => 'required',
//        ]);
//
//        if($validator->fails()){
//            return redirect()
//                ->route('group_path', $id);
//        }
        $idCliente=auth()->guard('cliente')->user();
        $cliente_e = Cliente::get()->where('email', $request->get('email'));

        if ($cliente_e->count() > 0){
            return redirect()->route('group_path', $id)->with('error',' Ya existe un usuario con el email '.$request->get('email').'');
        }else{
            $password = str_random(8);
            $hashed_password = Hash::make($password);

            $cliente = new Cliente();
            $cliente->remember_token = $request->get('_token');
            $cliente->nombres = $request->get('name_txt');
            $cliente->email = $request->get('email');
            $cliente->password = $hashed_password;
            $cliente->estado = 1;
            $cliente->save();

            $cliente_cotizacion = new ClienteCotizacion();
            $cliente_cotizacion->cotizaciones_id = $id;
            $cliente_cotizacion->clientes_id = $cliente->id;
            $cliente_cotizacion->estado = 0;
            $cliente_cotizacion->save();


            $email = $request->get('email');
            $name = $request->get('name_txt');

            try {
                Mail::send(['html' => 'group_notification'], ['nombre1' => $idCliente->nombres, 'apellido1' => $idCliente->apellidos, 'nombre2' => $request->get('name_txt'), 'email' => $request->get('email'), 'password' => $password], function ($messaje) use ($email, $name) {
                    $messaje->to($email, $name)
                        ->subject('Solicitud de datos')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.com', 'GotoPeru');
                });

//
//                Mail::send(['html' => 'confirm_notifications_admin'], ['name' => $idCliente->nombres, 'apellido' => $idCliente->apellidos, 'codigo' => $paquete->codigo, 'titulo' => $paquete->titulo], function ($messaje) use ($from) {
//                    $messaje->to($from, 'GotoPeru')
//                        ->subject('Inquire GotoPeru.Travel')
//                        /*->attach('ruta')*/
//                        ->from('info@gotoperu.com', 'GotoPeru.Travel');
//                });


//            Session::flash('message', $name.' hola');


                return redirect()->route('group_path', $id)->with('success',' Los datos fueron guardados satisfactoriamente. Se envio un email para '.$request->get('email').' con su usuario y contraseña.');

//            return redirect()->route('home_path');
            }
            catch (Exception $e){
                return $e;
            }

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idCliente=auth()->guard('cliente')->user()->id;
        $cotizaciones = Cotizacion::with(['cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente)->where('estado', 1);}])
            ->get()
            ->sortByDesc('fecha');
        $paquetes_num = PaqueteCotizacion::with(['cotizaciones.cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])->get();

        $cliente = Cliente::findOrFail($id);

        return view('groups_edit', ['cotizaciones'=>$cotizaciones, 'paquetes_num'=>$paquetes_num, 'cliente'=>$cliente]);
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
        $time = strftime('%Y-%m-%d', strtotime($request->get('nacimiento_txt')));

        $password = $request->get('password_txt');
        $hashed_password = Hash::make($password);

        $cliente = Cliente::findOrFail($id);

        $cliente->remember_token = $request->get('_token');


        $cliente->nombres = $request->get('name_txt');
        $cliente->apellidos = $request->get('last_txt');
        $cliente->sexo = $request->get('sexo_rbo');
        $cliente->fechanacimiento = $time;
        $cliente->email = $request->get('email_txt');
        $cliente->password = $hashed_password;
        $cliente->telefono = $request->get('telefono_txt');
        $cliente->pasaporte = $request->get('passport_txt');
        $cliente->nacionalidad = $request->get('nacionalidad_txt');
        $cliente->residencia = $request->get('residencia_txt');
        $cliente->restricciones = $request->get('restricciones_txt');
        $cliente->alergias = $request->get('alergias_txt');

        $cliente->dieta = $request->get('dieta_txt');
        $cliente->comentarios = $request->get('comentarios_txt');

        $cliente->estado = 1;

        $cliente->save();

        return redirect()->route('client_edit_path', $cliente->id)->with('success','Se  actualizaron sus datos');

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
}
