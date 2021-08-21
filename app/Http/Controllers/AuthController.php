<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Validator;

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
            if ($userCheck->active==0) {
                return redirect()->back()->withErrors('Your account has been terminate! Please contact with admin if you think it\'s a mistake!');
            }
            $request->session()->put('logged_in', TRUE);
            $request->session()->put('login_id', $userCheck->login_id);
            $request->session()->put('user_type', $userCheck->user_type);
            
            $userLogin = UserModel::find($userCheck->login_id);
            $userLogin->update(['last_login_datetime'=>date('Y-m-d H:i:s')]);
            return redirect('/dashboard');
        }else{
            //$request->session()->flash('e', 'Invalid username or password!');
            return redirect()->back()->withErrors('Invalid username or password!');
            //return redirect('/login');
        }
    }

    public function login_api(Request $request)
    {
        // $validator = $this->validate($request, [
        //     'email'=> 'required|email',
        //     'password'=> 'required'
        //     ]);
        $validator = Validator::make($request->all(), [
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
            
            if ($validator->fails()) {
                return json_encode(['status'=>'200', 'error'=>$validator->errors()]);
            }else{
                $userCheck = UserModel::where('email','=',$request->email)
                    ->where('password', '=', md5($request->password));
           
                if ($userCheck->count()>0) {
                    $userCheck = $userCheck->first();
                    if ($userCheck->active==0) {
                        header("Content-Type: application/json");
                        return json_encode(['status'=>'200', 'error'=>'Your account has been terminate! Please contact with admin if you think it\'s a mistake!']);
                    }
                    $request->session()->put('logged_in', TRUE);
                    $request->session()->put('login_id', $userCheck->login_id);
                    $request->session()->put('user_type', $userCheck->user_type);
                    
                    $userLogin = UserModel::find($userCheck->login_id);
                    $userLogin->update(['last_login_datetime'=>date('Y-m-d H:i:s')]);
                    
                    $data = [
                        'login_id'=>$userCheck->login_id,
                        'email'=>$userCheck->email,
                        'registration_datetime'=>$userCheck->registration_datetime,
                        'last_login_datetime'=>$userCheck->last_login_datetime,
                        'user_type'=>$userCheck->user_type,
                    ];

                    return json_encode(['status'=>'200', 'data'=>$data]);
                }else{
                    return json_encode(['status'=>'200', 'error'=>'Invalid username or password!']);
                }
            }
        
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }

    public function logout_api(Request $request)
    {
        $request->session()->flush();
        return json_encode(['status'=>'200', 'success'=>true]);
    }
}
