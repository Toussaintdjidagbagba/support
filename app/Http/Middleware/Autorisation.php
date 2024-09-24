<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Autorisation
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
        if (session('DateConnexion') != date('Y-m-d')) {
            return redirect('connexion');
        }elseif( !isset(session("utilisateur")->idUser) ){
            return redirect('connexion');
        }
        return $next($request); 
    }
}
