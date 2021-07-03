<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 use App\Models\Member;
 use Illuminate\Support\Facades\DB;

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
       'password'=> 'required|max:5'
]);
         if($validation->fails()){

            return redirect('/login')->with ('errors',$validation->errors());
       }

      $member=Member::where('username',$req->username)
      ->where('usermail',$req->usermail)
      ->where ('password',$req->password)
      ->get();

      if(count($member) >0){
        $req->session()->put('username',$req->username);
        $req->session()->put('usermail',$req->usermail);
        $req->session()->put('password',$req->password);
        return redirect('/homepage');
      }
    else{

        $req->session()->flash('msg','Back one step and register Yourself');
        return redirect('/login');

    }

 }


   
  
  }        




  

     
