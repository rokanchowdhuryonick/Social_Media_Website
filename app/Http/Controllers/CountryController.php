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

    public function index_api()
    {
        $countryList = CountryModel::all();
        header("Content-Type: application/json");
        $data['countryList'] = $countryList;
        return json_encode(['status'=>'200', 'data'=>$data]);
        
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


    public function createCountry_api(Request $req)
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
            return json_encode(['status'=>'200', 'success'=>true]);
        }else{
            return json_encode(['status'=>'200', 'success'=>false, 'error'=> $validator->errors()]);
        }
        
    }

    public function updateViewCountry($id=null)
    {
        if ($id) {
            $country = CountryModel::find($id);
            return view('admins.countryEdit')->with('country', $country);
        }
    }

    public function updateCountry(Request $req, $id)
    {
        $validator = $this->validate($req, [
            'country_name'=> 'required'
            ]);

        $country= CountryModel::find($id);
        $country->country_name = $req->country_name;
        $country->update();

        return redirect('/country')->with('message', 'Country successfully updated!');
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

    public function deleteCountry_api($id)
    {
        $country = CountryModel::find($id);
        $countryDeleted = $country->delete();

        if ($countryDeleted) {

            //$req->session()->flash('message', 'Country successfully deleted!');
            return json_encode(['success'=>true, 'message'=>'Successfully deleted!']);
        }else{
            return json_encode(['success'=>false, 'error'=>'Failed to delete!']);
        }
    }
}
