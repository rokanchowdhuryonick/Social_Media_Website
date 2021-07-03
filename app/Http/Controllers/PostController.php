<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Member;
use validator;



class PostController extends Controller
{

    public function getview(){
        $posts = Post::all();
        return view('homepage',['posts'=>$posts]);
 }

     public function postCreatePost(Request $req){
        
         
        $validator = $this->validate($req, [
            'body'=> 'required|max:1000'
            ]);

        $validatedText = [
            'body' => $req->body,
            'user_id' => 1
        ];

        $postCreated = Post::create($validatedText);
        if ($postCreated) {
            $req->session()->flash('message', 'Your idea successfully post!');
            return redirect('/homepage');
        }else{
            $validator->errors()->add(
                'msg', 'Something is wrong with this field!'
            );
            
        }
        
    }  

    public function deletePost($id)
    {
        $post = Post::find($id);
        $postDeleted = $post->delete();

        if ($postDeleted) {

            
            return redirect()->back()->with('message', 'post successfully deleted!');
        }else{
            return redirect()->back()->withErrors(['error'=>'Failed to delete!']);
        }
    }
       public function viewpost($id=null){
      
        {
            if ($id) {
                $post = Post::find($id);
                return view('/homepage',['post', $post]);
            }
        }
    
               function editpost(Request $req, $id){
        
            $validator = $this->validate($req, [
                'body'=> 'required|max:1000'
                ]);
    
            $post= Post::find($id);
            $post->body = $req->body;
            $post->update();
    
            return redirect('/homepage')->with('message', 'edit successfully updated!');
        }
       }


    }



