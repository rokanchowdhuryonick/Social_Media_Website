<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\UserDataModel;
use App\Models\CountryModel;
use App\Models\NoticeModel;
use Illuminate\Support\Facades\Hash;

use Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userId = session()->get('login_id');
        $userData = UserModel::join('user_data', 'login.login_id', '=', 'user_data.login_id')
                    ->where('login.login_id','=', $userId)->first();
        $notices = NoticeModel::where('notice_for','=',$userId)
                               ->orWhere('notice_for','=',0)->get();
        return view('admins.dashboard')->with('userData', $userData)
                                        ->with('noticeList', $notices);
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

    public function updateAdmin(Request $request, $id)
    {
        $updateType = $request->updateType;
        $datas=[];
        $datas['userData'] = UserModel::join('user_data', 'login.login_id', '=', 'user_data.login_id')
                    ->where('login.login_id','=', $id)->first();
        $datas['countryList'] = CountryModel::all();

        if ($updateType=="adminDataUpdate") {
            $validator = Validator::make($request->all(), [
                'name'=> 'required',
                'phone'=> 'required'
                ]);
            
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
                //return json_encode(['success'=>false, 'errors'=>$validator->errors()]);
            }else{
                $user = UserDataModel::find($id);
                $updated = $user->update($request->all());
                if ($updated) {
                    $request->session()->flash('message', 'Admin data successfully updated');
                    return redirect()->route('admin.update', [$id]);
                }else{
                    return redirect()->back()->withErrors('Failed to update admin data');
                }
            }
        }

        if ($updateType=="adminPasswordUpdate") {
            $validator = Validator::make($request->all(), [
                'password'=> 'required|min:4'
                ]);
            
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator);
                    //return json_encode(['success'=>false, 'errors'=>$validator->errors()]);
                }else{
                    $user = UserModel::find($id);
                    $updated = $user->update(['password'=>md5($request->password)]);
                    if ($updated) {
                        $request->session()->flash('message', 'Admin password successfully updated');
                        return redirect()->route('admin.update', [$id]);
                    }else{
                        return redirect()->back()->withErrors('Failed to update admin password');
                    }
                }
        }
        

        return view('admins.updateAdmin')->with('datas', $datas);
        
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

    public function convertToUser($id)
    {
        $user = UserModel::find($id);
        $converted = $user->update(['user_type'=>'individual']);
        if ($converted) {
            session()->flash('message', 'An admin converted to user successfully!');
            return redirect('/admin');
        }else{
            return redirect()->back()->withErrors('Failed to convert!');
        }
    }

    public function exportUsersToCSV()
    {
        $userList = UserModel::join('user_data', 'login.login_id', '=', 'user_data.login_id')
                            ->where('user_type','=', 'individual')->get();

        $fileName = "Users_".date('d-m-Y').".csv";
		$output = fopen("php://output", "w");
        header("Content-Description: Users List CSV File Generate");
	    header('Content-Type: application/csv;');  
	    header('Content-Disposition: attachment; filename='.$fileName);
        $header = array('#', 'User Id', 'Name', 'Phone', 'Email', 'Date of birth', 'Gender', 'Profile Image Location',  'Cover Image Location', 'Registration DateTime', 'Last Login Date Time');
	    fputcsv($output, $header); 
        $i=0;
	    foreach ($userList as $row) {
	    	$tempRow = [
	      		'sl' => ++$i,
	      		'login_id' => $row['login_id'],
	      		'name' => $row['name'],
	      		'phone' => sprintf(" %s",$row['phone']),
	      		'email' => $row['email'],
	      		'dob' => $row['dob'],
	      		'gender' => $row['gender'],
                'profile_photo' => $row['profile_photo'],
                'cover_photo' => $row['cover_photo'],
	      		'registration_datetime' => $row['registration_datetime'],
	      		'last_login_datetime' => $row['last_login_datetime'],
	      	];
	      	fputcsv($output, $tempRow);
	           // print_r($tempRow);
	           // echo "<br>";
	    }  
	    fclose($output);
        exit('This file download date time : '.date("d/m/Y h:i:s A"));
    }
}
