<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticeModel;
use App\Models\UserModel;
use Validator;

class NoticeController extends Controller
{
    public function index()
    {
        $datas = [];
        $datas['noticeList'] = NoticeModel::all();
        $datas['userList'] = UserModel::all();
        return view('admins.notice', $datas);
    }

    public function createNotice(Request $request)
    {
        $validator = $this->validate($request, [
            'notice_title'=> 'required',
            'notice_text'=> 'required',
            'notice_for'=> 'required'
            ]);
        $datas = $request->all();
        $datas['created_at'] = date('Y-m-d H:i:s');

        $created = NoticeModel::create($datas);
        if ($created) {
            $request->session()->flash('message', 'Notice successfully created!');
            return redirect('/notice');
        }else{
            return redirect()->back()->withErrors('Something went wrong!');
        }

    }

    public function getNotice($id)
    {
        $notice = NoticeModel::find($id);
        $response = ['success'=>false];
        if ($notice) {
            $noticeData = [
                'notice_id' =>$id,
                'notice_title'=>$notice->notice_title,
                'notice_text'=>$notice->notice_text,
                'notice_for'=>$notice->notice_for
            ];

            $response['success'] = true;
            $response['data'] = $noticeData;
        }
        
        
        return json_encode($response);
        
    }

    public function updateNotice(Request $request, $id)
    {
        $notice = NoticeModel::find($id);
        if ($notice) {
            $validator = Validator::make($request->all(), [
                'notice_title'=> 'required',
                'notice_text'=> 'required',
                'notice_for'=> 'required'
                ]);
            
            if ($validator->fails()) {
                return json_encode(['success'=>false, 'errors'=>$validator->errors()]);
            }else{
                $updated = $notice->update([
                    'notice_title'=>$request->notice_title,
                    'notice_text'=>$request->notice_text,
                    'notice_for'=>$request->notice_for
                    
                ]);
    
                if ($updated) {
                    return json_encode(['success'=>true, 'message'=>'Successfully Updated']);
                }else{
                    return json_encode(['success'=>false, 'message'=>'Failed to Update']);
                }
            }
            
        }

        return json_encode(['success'=>false, 'message'=>'Notice not found']);
    }

    public function deleteNotice($id)
    {
        $notice = NoticeModel::find($id);
        $deleted = $notice->delete();
        if ($deleted) {
            session()->flash('message', 'Notice successfully deleted!');
            return redirect('/notice');
        }else{
            return redirect()->back()->withErrors('Something went wrong!');
        }
    }
}
