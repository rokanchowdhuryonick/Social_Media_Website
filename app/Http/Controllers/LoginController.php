<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 use App\Models\Member;
 use Illuminate\Support\Facades\DB;
 //use Session;
 use Validator;




class LoginController extends Controller
{
    public function showview(){
        return view('login');
    }
    
 public function validation(Request $req){

    $validation = Validator::make($req->all(), [
    'username'=> 'required|min:5',
     'usermail'=>'required|regex:/^.+@.+$/i',
    'password'=> 'required|max:8'
]);
         if($validation->fails()){

            return redirect('/login')->with ('errors',$validation->errors());
       }

    else{
    $req->session();
    return redirect('/homepage');

    }

 }


   
  
  }        




  

     
