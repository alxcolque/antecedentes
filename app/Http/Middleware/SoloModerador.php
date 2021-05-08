<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloModerador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        switch(auth::user()->rol){
            case ('1'):
                return redirect('home');//si es administrador redirige al HOME
            break;
			case('2'):
                return $next($request);// si es un moderador  continua ruta MODe
			break;	
            case ('3'):
                return redirect('consultor');//si es administrador redirige al moderador
            break;
        }
    }
}
