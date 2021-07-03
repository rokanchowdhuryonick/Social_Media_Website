<?php

namespace App\Http\Controllers;
use App\Models\jobmodel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class createpostcontroller extends Controller
{
    public function createpost()
    {
          
       return view('createpost');
       
    }
    public function addjob(Request $req){
 
        $jobs= new jobmodel;
        $jobs->id=$req->id;
        $jobs->title=$req->title;
        $jobs->salary=$req->salary;
        $jobs->description=$req->description;
        $jobs->save();
        

        if (DB::table('jobs')->insert([
           ]))
           { 
            $req->session()->flash('msg2', 'Successful!');
            return view('createpost');
            }
          else{
           $req->session()->flash('msg2', 'unSuccessful!');
            return view('createpost');
              }
      

            
     

   }
        
}