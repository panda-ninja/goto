<?php

namespace GotoPeru\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotCliente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'cliente')
    {
        if (!auth()->guard($guard)->check()) {
            //return redirect()->route('Cliente_auth_index_path');
            return redirect()->route('home_path');

            //return redirect('/admin/login');
        }

        return $next($request);
    }
}
