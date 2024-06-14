<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;



class LikeController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function like($postId, Request $request){
//para poder dar like a un post que si existe
        $post = Post::findOrFail($postId);

        if ($post->user_id == Auth::user()->id){
            abort(403, 'You cannot like your own post');
        }

        $like = Like::where('post_id', '=', $postId)->where('user_id', '=', Auth::user()->id)->first();

        // dd($like);
        if ($like != NULL){
            abort(403, 'You cannot like a post more than once');

        }


        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->post_id = $postId;
        $like->save();
        return redirect()->route('index')->with('status', 'Post liked');
    }
}
