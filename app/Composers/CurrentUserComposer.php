<?php

namespace GotoPeru\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
//use Illuminate\Contracts\Auth\Guard;

class CurrentUserComposer{
    /*protected $auth;
    public function __construct(Guard $guard)
    {
        $this->auth=$auth;
    }*/
    public function compose(View $view){
        $view->with('currentUser',Auth::cliente());
    }

}