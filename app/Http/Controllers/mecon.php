<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mecon extends Controller
{
    public function me()
    {
        return view('me');
    }
}
