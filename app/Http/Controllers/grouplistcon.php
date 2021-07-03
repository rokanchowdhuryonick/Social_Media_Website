<?php

namespace App\Http\Controllers;
Use App\Models\create_group;
use Illuminate\Http\Request;

class grouplistcon extends Controller
{   
public function list()
{
    $data=create_group::all();
    return view('group.list',['create_groups'=>$data]);
}

public function delete($id , Request $req){
  
    $data=create_group::find($id);
    $data->delete();

    $req->session()->flash('msg', 'Group Member is deleted!');
    return redirect('/group/list');


}

public function edit($id){

    $data=create_group::find($id);
    return view('group.edit',['data'=>$data]);
}

public function update_data(Request $req){
    $data=create_group::find($req->id);
    $data->uname= $req->uname;
    $data->group_name= $req->group_name;
    $data->email= $req->email;
    $data->save();
    $req->session()->flash('msg1', 'Sussesfully Updated!');
    return redirect('/group/list');



}
public function details($id){

    $data=create_group::find($id);
    return view('group.details',['data'=>$data]);
}
}
