<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::user()->is_admin == 1 ){
            return $next($request);
        } else {
            return redirect()->route('home');   
        }
        
    }
}
