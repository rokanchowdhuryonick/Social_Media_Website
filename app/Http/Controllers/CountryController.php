<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryModel;
use validator;

class CountryController extends Controller
{
    public function index()
    {
        $countryList = CountryModel::all();
        return view('admins.country')->with('countryList', $countryList);
    }

    public function createCountry(Request $req)
    {
        $validator = $this->validate($req, [
            'country_name'=> 'required|unique:country'
            ]);
//dd($validator);
        $validatedData = [
            'country_name' => $req->country_name,
            'status' => 1
        ];

        $countryCreated = CountryModel::create($validatedData);
        if ($countryCreated) {
            $req->session()->flash('message', 'Country successfully added!');
            return redirect('/country');
        }else{
            $validator->errors()->add(
                'field', 'Something is wrong with this field!'
            );
            //$req->session()->flash('message', 'Country successfully added!');
            //return redirect()->back()->withErrors($validator)->withInput();;
        }
        
    }

    public function updateCountry(Request $req, $id)
    {
        $country= CountryModel::find($id);
        $country->country_name = $req->country_name;
        $country->save();

        return redirect()->route('/country');
    }

    public function deleteCountry($id)
    {
        $country = CountryModel::find($id);
        $countryDeleted = $country->delete();

        if ($countryDeleted) {

            //$req->session()->flash('message', 'Country successfully deleted!');
            return redirect()->back()->with('message', 'Country successfully deleted!');
        }else{
            return redirect()->back()->withErrors(['error'=>'Failed to delete!']);
        }
    }
}
