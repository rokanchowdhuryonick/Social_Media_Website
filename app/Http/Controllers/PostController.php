<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Member;



class PostController extends Controller
{

    public function getview(){
        $posts = Post::all();
        return view('homepage',['posts'=>$posts]);
 }

     public function postCreatePost(Request $request){
        
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $message = 'There was an error';
        if ($request->member()->posts()->save($post)) {
            $message = 'Post successfully created!';
        }
        return redirect()->route('/homepage')->with(['message' => $message]);
    }





    // public function getDeletePost($post_id)
     //{
        // $post = Post::where('id', $post_id)->first();
         //if (Auth::member() != $post->member) {
            // return redirect()->back();
         //}
         //$post->delete();
         //return redirect()->route('/homepage')->with(['message' => 'Successfully deleted!']);
     }
      
     

//}

