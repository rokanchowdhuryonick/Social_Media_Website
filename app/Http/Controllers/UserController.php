<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Validator;
use Illuminate\Support\Facades\DB;
//use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class UserController extends Controller
{
    public function getview(){
        return view('signup');
 }

   public function addmember(Request $req){

     $username = $req['username'];
     $usermail = $req['usermail'];
     $password = $req['password'];

     $member = new Member();
     $member->username = $username;
     $member->usermail = $usermail;
     $member->password = $password;
     
     $member->save();

     //Auth::login($member);

      $validation = Validator::make($req->all(), [
        'username'=>'required|min:5',
        'usermail'=>'required|regex:/^.+@.+$/i',
        'password'=>'required|max:8'
    ]);
    
           if($validation->fails()){
    
             return redirect('/signup')->with ('errors',$validation->errors());
      
           }
    
        else{
           $req->session()->flash('msg', 'You are register!','Login first');
           return redirect('/login');
        }
    }


   }
  
    


