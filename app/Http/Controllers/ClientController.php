<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $guard='cliente';

    public function index()
    {
        return view('auth.register');
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $from = "hidalgochpnce@gmail.com";
        $cliente_e = Cliente::get()->where('email', $request->get('email'));

        if ($cliente_e->count() > 0){
            return redirect()->route('client_register_path')->with('error',' Ya existe un usuario con el email '.$request->get('email').'');
        }else{
            $password = $request->get('password');
            $hashed_password = Hash::make($password);

            $cliente = new Cliente();
            $cliente->remember_token = $request->get('_token');
            $cliente->nombres = $request->get('first');
            $cliente->apellidos = $request->get('last');
            $cliente->email = $request->get('email');
            $cliente->password = $hashed_password;
            $cliente->estado = 1;
            $cliente->save();

            $email = $request->get('email');
            $name = $request->get('first');

            try {
                Mail::send(['html' => 'notifications.notification-register'], ['name' => $name, 'email' => $request->get('email'), 'password' => $password], function ($messaje) use ($email, $name) {
                    $messaje->to($email, $name)
                        ->subject('Registro Satisfactorio')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.com', 'GotoPeru');
                });


                Mail::send(['html' => 'notifications.notification-admin-register'], ['name' => $name, 'email' => $request->get('email'), 'password' => $password], function ($messaje) use ($from) {
                    $messaje->to($from, 'GotoPeru')
                        ->subject('Register GotoPeru.Travel')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.com', 'GotoPeru.Travel');
                });


//            Session::flash('message', $name.' hola');

                if(auth()->guard($this->guard)->attempt($request->only(['email','password']))){
                    return redirect()->route('quotes_path');
                }

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
}
