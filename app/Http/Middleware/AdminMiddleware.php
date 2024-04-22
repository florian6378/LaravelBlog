<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{

    
    
    public function handle(Request $request, Closure $next)
    {
        // Vérifiez si l'utilisateur est authentifié et s'il a le rôle d'administrateur
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Redirigez l'utilisateur vers une page d'accès refusé
        return redirect()->route('access.denied');
    }
}
