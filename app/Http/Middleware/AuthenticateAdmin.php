<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateAdmin {
    public function handle($request, Closure $next){
        if(auth()->user()->isAdmin()){
            return $next($request);
        }
        else{
            return redirect('/dashboard');
        }
    }
}