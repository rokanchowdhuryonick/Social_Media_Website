<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $req, Closure $next)
    {
        if ($req->session()->has('username','usermail','password'))   
    {
    return $next($req);
    }

    else
     $req->session()->flash('msg','You have to login first');
     return redirect('/login');
    }

}