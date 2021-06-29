<?php

namespace App\Http\Controllers;
use App\Models\jobmodel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class createpostcontroller extends Controller
{
    public function createpost()
    {
          
        $jobid = DB::table('job')->get();
        return view('createpost')->with('jobid', $jobid);
       
    }
    public function addjob(Request $req){

        $job = new jobmodel();
       
       
     
        $job->jobid = $request->session()->get('jobid');
        $job->title =  $request->title;
        $job->salary =  $request->salary;
        
      
       
        $file =  $request->file('image');
        $file->move('upload', $file->getClientOriginalName());
      
        $product->product_img = $file->getClientOriginalName();
        
        $vvv = DB::table('job')->where('title', $job->title)->first('title');
        foreach ($vvv as $value) {
            $job->title = $value;
        }
        
        if (DB::table('job')->insert([
            'id' => $request->session()->get('id'),
            'title' => $job->title,
            'salary' => $job->salary,
            
            
            'image' => $job->image,
            'description' => $job->discription
            
        ])) {
            $request->session()->flash('status', 'successful!');
            $jobid = DB::table('job')->get();
            return view('job')->with('id', $jobid);
        } else {
            $request->session()->flash('status', 'UNsuccessful!');
            $jobid = DB::table('job')->get();
            return view('job')->with('id', $jobid);
        }
    






        }
}
