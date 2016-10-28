<?php

namespace GotoPeru\Http\Controllers;

use Illuminate\Http\Request;

use GotoPeru\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    //
    protected $guard='cliente';
    public function index(){
        return view('auth.clientlogin');
    }
    public function store(Request $request){
        $this->validate($request,['email'=>'required|email','password'=>'required']);

        if(auth()->guard($this->guard)->attempt($request->only(['email','password']))){
            return redirect()->route('quotes_path');
        }
        else{
            return redirect()->route('client_auth_index_path')
                ->withErrors(['No encontramos al cliente'])
                ->withInput();
        }

    }
    public function destroy(){
        auth()->guard('cliente')->logout();
        return redirect()->route('client_auth_index_path');
    }
}
