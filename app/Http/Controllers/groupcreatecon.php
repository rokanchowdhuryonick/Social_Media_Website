<?php

namespace App\Http\Controllers;
use App\Models\create_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class groupcreatecon extends Controller
{
    public function create(){
        return view('group.create');
      
    }
    public function create2(Request $req){
        
        $create_group= new create_group;
        $create_group->uname=$req->uname;
        $create_group->group_name	=$req->group_name	;
        $create_group->email=$req->email;
        $create_group->save();
        

        if (DB::table('create_groups')->insert([
           ]))
           { 
            $req->session()->flash('msssg', 'Successful!');
            return view('group.create');
            }
          else{
           $req->session()->flash('msssg', 'unSuccessful!');
            return view('group.create');
              }
      


     

   }
        
}
