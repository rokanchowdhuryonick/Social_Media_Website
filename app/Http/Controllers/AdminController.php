<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\UserDataModel;
use Illuminate\Support\Facades\Hash;

use validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userId = session()->get('login_id');
        $userData = UserModel::join('user_data', 'login.login_id', '=', 'user_data.login_id')
                    ->where('login.login_id','=', $userId)->first();
        return view('admins.dashboard')->with('userData', $userData);
    }
    public function index()
    {
        $adminList = UserModel::join('user_data', 'login.login_id', '=', 'user_data.login_id')
                            ->where('user_type','=', 'admin')->get();
        
        return view('admins.admins')->with('adminList', $adminList);
    }

    public function addAdmin(Request $req)
    {
        $validator = $this->validate($req, [
            'email'=> 'required|email|unique:login',
            'password'=> 'required|min:4',
            'name'=> 'required'
            ]);
        //dd($validator);
        $validated = [
            'email'=>$req->email,
            'password'=>md5($req->password),
            'registration_datetime'=>date('Y-m-d H:i:s'),
            'active'=>1,
            'user_type'=>'admin'
        ];
        //dd($validated);
        $adminCreated = UserModel::create($validated);
        
        if ($adminCreated) {
            UserDataModel::create([
                'login_id'=>$adminCreated->login_id,
                'name'=>$req->name,
                'phone'=>$req->phone,
            ]);

            $req->session()->flash('message', 'Admin successfully added!');
            return redirect('/admin');
        }else{
            $validator->errors()->add(
                'field', 'Something is wrong with this field!'
            );
            //$req->session()->flash('message', 'Country successfully added!');
            //return redirect()->back()->withErrors($validator)->withInput();;
        }
    }

    public function deleteAdmin($id)
    {
        $userData = UserDataModel::where('login_id','=', $id);
        $userDataDeleted = $userData->delete();

        if ($userDataDeleted) {
            UserModel::find($id)->delete();
            
            //session()->flash('message', 'Country successfully deleted!');
            return redirect()->back()->with('message', 'An admin account successfully deleted!');
        
        }else{
            return redirect()->back()->withErrors(['error'=>'Failed to delete!']);
        }
    }
}
