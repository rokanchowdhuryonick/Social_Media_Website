<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutcon extends Controller
{
    public function logout(Request $req)
    {
        $req->session()->flush();
        return redirect('/login');
    }
}
