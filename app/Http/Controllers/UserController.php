<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\UserDataModel;
use App\Models\CountryModel;

class UserController extends Controller
{
    public function index()
    {
        $userList = UserModel::join('user_data', 'login.login_id', '=', 'user_data.login_id')
        ->where('user_type','=', 'individual')->get();
        //print_r($userList);
        
        $usersList=[];
        foreach ($userList as $value) {
            $usersList[]=[
                'login_id'=>$value['login_id'],
                'name'=>$value['name'],
                'email'=>$value['email'],
                'phone'=>$value['phone'],
                'country_name'=> empty($value['country_id'])?"---":$this->getCountryName($value['country_id'])->country_name,
                'active'=>$value['active'],
            ];
        }
        // print_r($usersList);
        // exit;
        return view('admins.users')->with('userList', $usersList);
    }

    public function profileView($id)
    {
        $userData = UserModel::join('user_data', 'login.login_id', '=', 'user_data.login_id')
                            ->where('user_type','=', 'individual');
        if ($userData->count()>0) {
            $userData = $userData->get();
            $userData = $userData[0];
            return view('users.userProfile')->with('user',$userData);
        }else{
            return redirect()->back()->withErrors('User does not exists!');
        }
        
    }

    private function getCountryName($id=null)
    {
        $country = CountryModel::find($id);
        if ($country) {
           return $country;
        }
        return null;
    }

    public function activeUserProfile($id)
    {
       $user = UserModel::find($id);
       $updated = $user->update(['active'=>1]);
       if ($updated) {
           session()->flash('message', 'User account successfully activate!');
           return redirect('/users');
       }else{
           return redirect()->back()->withErrors('Something went wrong');
       }
    }

    public function deactiveUserProfile($id)
    {
        $user = UserModel::find($id);
        $updated = $user->update(['active'=>0]);
        if ($updated) {
            session()->flash('message', 'User account successfully deactivate!');
            return redirect('/users');
        }else{
            return redirect()->back()->withErrors('Something went wrong');
        }
    }


    
}
