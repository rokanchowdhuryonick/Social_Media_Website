<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingsModel;
use Validator;

class SettingsController extends Controller
{
    public function updatePrivacyPolicyView(Request $response)
    {
        $privacyPolicy = SettingsModel::where('setting_key', '=', 'privacy_policy')->first();

    
        return view('admins.privacy-policy', ['privacyPolicy'=>$privacyPolicy]);
    }

    public function updatePrivacyPolicyPost(Request $response)
    {
        $validator = Validator::make($response->all(), [
            'privacy_policy'=>'required'
        ]);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator);
        }else{
            $updated = SettingsModel::where('setting_key', '=', 'privacy_policy')->update(['setting_value'=>$response->privacy_policy]);

            if ($updated) {
                //$request->session()->flash('message', 'Privacy & policy successfully updated');
                return redirect()->back()->with('message', 'Privacy & policy successfully updated');
            }else{
                return redirect()->back()->withErrors('Failed to update privacy policy data');
            }
        }
    }

    public function viewPrivacyPolicy()
    {
        $privacyPolicy = SettingsModel::where('setting_key', '=', 'privacy_policy')->first();
        return view('generals.privacy-policy', ['privacyPolicy'=>$privacyPolicy]);
    }
}
