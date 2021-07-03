<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $userList = [];//CountryModel::all();
        return view('admins.users')->with('userList', $userList);
    }

    public function profileView($id)
    {
        echo "Hello Mike testing...";
    }
}
