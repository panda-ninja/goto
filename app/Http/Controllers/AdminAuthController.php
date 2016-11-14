<?php

namespace GotoPeru\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    //
    protected $guard='admin';
    public function index(){
        return view('auth.adminlogin');
    }
    public function store(Request $request){
        $this->validate($request,['email'=>'required|email','password'=>'required']);

        if(auth()->guard($this->guard)->attempt($request->only(['email','password']))){
            return redirect()->route('inicio_path');
        }
        else{
            return redirect()->route('admin_auth_index_path')
                ->withErrors(['No encontramos al usuario'])
                ->withInput();
        }

    }
    public function destroy(){
        auth()->guard('admin')->logout();
        return redirect()->route('admin_auth_index_path');
    }
}
