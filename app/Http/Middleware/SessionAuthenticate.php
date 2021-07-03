<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionAuthenticate
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
        if($request->session()->has('logged_in') && $request->session()->has('user_type')){
            return $next($request);
        }else{
            //$request->session()->flash('message', 'Un-authorized request!');
            return redirect('/login');
        }
    }
}
