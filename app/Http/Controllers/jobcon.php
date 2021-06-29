<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jobcon extends Controller
{
    public function jobpost()
    {
        return view('job');
    }
}
