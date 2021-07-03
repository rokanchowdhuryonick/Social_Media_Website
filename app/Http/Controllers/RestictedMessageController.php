<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestictedMessageModel;
use validator;

class RestictedMessageController extends Controller
{
    public function index()
    {
        $bannedMessageList = RestictedMessageModel::all();
        return view('admins.restictedWord')->with('bannedMessageList', $bannedMessageList);
    }

    public function addRestictedMessage(Request $req)
    {
        $validator = $this->validate($req, [
            'message'=> 'required|unique:banned_message'
            ]);

        $restictedWordCreated = RestictedMessageModel::create($validator);
        if ($restictedWordCreated) {
            $req->session()->flash('message', 'A resticted word successfully added!');
            return redirect('/restictedWord');
        }else{
            $validator->errors()->add(
                'field', 'Something is wrong with this field!'
            );
            //$req->session()->flash('message', 'Country successfully added!');
            //return redirect()->back()->withErrors($validator)->withInput();;
        }
    }

    public function deleteRestictedMessage($id)
    {
        $restictedWord = RestictedMessageModel::find($id);
        $restictedWordDeleted = $restictedWord->delete();

        if ($restictedWordDeleted) {

            //$req->session()->flash('message', 'Country successfully deleted!');
            return redirect()->back()->with('message', 'Resticted word successfully deleted!');
        }else{
            return redirect()->back()->withErrors(['error'=>'Failed to delete!']);
        }
    }
}
