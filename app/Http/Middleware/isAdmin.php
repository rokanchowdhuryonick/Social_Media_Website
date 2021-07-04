<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        if($request->session()->get('user_type') == 'admin'){
            return $next($request);
        }
   
        return redirect('/dashboard')->withErrors("You don't have access to that page.");

       // return $next($request);
    }
}
