<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryModel;

class CountryController extends Controller
{
    public function index()
    {
        $countryList = CountryModel::all();
        return view('admins.country')->with('countryList', $countryList);
    }

    public function createCountry(Request $req)
    {
        return $req->input();
    }
}
