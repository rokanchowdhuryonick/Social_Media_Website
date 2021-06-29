<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class messagingcon extends Controller
{
    public function message()
    {
        return view('message');
    }
}
