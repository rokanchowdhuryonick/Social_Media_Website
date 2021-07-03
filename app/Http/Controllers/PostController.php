<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;



class PostController extends Controller
{

    public function getview(){
        $posts = Post::all();
        return view('homepage',['posts'=>$posts]);
 }

     public function postCreatePost(Request $req){
        $post = new Post();
        $post->body = $req['body'];
        // var_dump($req['body']);
        $post->user_id = Auth::id(); ;
        $post->save();
        
        return redirect()->route('/homepage');
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

