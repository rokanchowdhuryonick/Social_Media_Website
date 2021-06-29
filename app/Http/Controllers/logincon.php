<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loginmodel;
use Validator;

class logincon extends Controller
{
    public function verify(){
        return view('login');
        
    }

   
    public function verify2(Request $req) {


        $validation=Validator::make($req-> all(),[
            'uname'=>'required',
            'password'=>'required'
        ]);
        if($validation->fails()) {
            return redirect('/login')->with('errors',$validation->errors());

        }

        
     $user=loginmodel::where('uname',$req->uname)
     ->where('password',$req->password)
     ->get();
     if(count($user) >0){
        $req->session()->put('uname',$req->uname);
        $req->session()->put('password',$req->password);
        return redirect('/home');
     }

        
     else 
       
       $req->session()->flash('mssg','invalid User ');
       return redirect('/login');
    }
       
}
  