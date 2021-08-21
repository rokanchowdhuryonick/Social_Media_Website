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

    public function index_api()
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
        return json_encode(['data'=>$userList]);
    }

    public function profileView($id)
    {
        $userData = UserModel::join('user_data', 'login.login_id', '=', 'user_data.login_id')
                            ->where('user_type','=', 'individual')
                            ->where('user_data.login_id','=',$id);
        if ($userData->count()>0) {
            $userData = $userData->get();
            $userData = $userData[0];
            return view('users.userProfile')->with('user',$userData)
                                            ->with('countryList', CountryModel::all());
        }else{
            return redirect()->back()->withErrors('User does not exists!');
        }
        
    }

    public function profileView_api($id)
    {
        $userData = UserModel::join('user_data', 'login.login_id', '=', 'user_data.login_id')
                            ->where('user_type','=', 'individual')
                            ->where('user_data.login_id','=',$id);
        if ($userData->count()>0) {
            $userData = $userData->get();
            $userData = $userData[0];
            $data = [
                'user'=>$userData,
                'countryList'=>CountryModel::all()
            ];
            header("Content-Type: application/json");
            return json_encode(['status'=>'200', 'data'=>$data]);
        }else{
            header("Content-Type: application/json");
            return json_encode(['status'=>'404', 'error'=>'User does not exists!']);
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

    public function convertToAdmin($id)
    {
        $user = UserModel::find($id);
        $converted = $user->update(['user_type'=>'admin']);
        if ($converted) {
            session()->flash('message', 'An users converted to admin successfully!');
            return redirect('/users');
        }else{
            return redirect()->back()->withErrors('Failed to convert!');
        }
    }


    
}
