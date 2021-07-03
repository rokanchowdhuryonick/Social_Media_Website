<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = $this->validate($request, [
            'email'=> 'required|email',
            'password'=> 'required'
            ]);
        $userCheck = UserModel::where('email','=',$request->email)
                    ->where('password', '=', md5($request->password));
        
                    
        if ($userCheck->count()>0) {
            $userCheck = $userCheck->first();

            
            $request->session()->put('logged_in', TRUE);
            $request->session()->put('login_id', $userCheck->login_id);
            $request->session()->put('user_type', $userCheck->user_type);
            
            return redirect('/dashboard');
        }else{
            //$request->session()->flash('e', 'Invalid username or password!');
            return redirect()->back()->withErrors('Invalid username or password!');
            //return redirect('/login');
        }
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
