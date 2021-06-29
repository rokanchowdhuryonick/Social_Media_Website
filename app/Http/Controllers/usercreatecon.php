<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercreatecon extends Controller
{
    public function create(){
        return view('group.create');
      
    }
    public function list(){


        $create_group=[
            ['id'=>1,'uname'=>'arshi','group_name'=>'laravel','email'=>'arshi@gmail.com'],
            ['id'=>2,'uname'=>'X','group_name'=>'laravel','email'=>'X@gmail.com'],
            ['id'=>3,'uname'=>'Y','group_name'=>'laravel','email'=>'Y@gmail.com'],
            ['id'=>4,'uname'=>'Z','group_name'=>'laravel','email'=>'Z@gmail.com']
        ];
          
        return view('group.list')->with('grouplist',$create_group);
      
    }

    public function details($id)
    {
        echo $id;
    }
}
