<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateOrgAdmin {
    public function handle($request, Closure $next){
        if(auth()->user()->isOrgAdmin()){
            return $next($request);
        }
        else{
            return redirect('/dashboard');
        }
    }
}
