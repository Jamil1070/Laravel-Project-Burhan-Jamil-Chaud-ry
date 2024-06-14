<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    //
//si alguien intenta ir a posts/create sin estar logeado , no lo vamos a dejar
    public function __construct(){
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }

    public function index (){
        //$posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::latest()->get();

        return view ('posts.index',compact ('posts'));
    }


    public function store (Request $request){
        $validated = $request->validate([
            'title'=> 'required|min:3',
            'message'=> 'required|min:3',

        ]);
        //CON ESTO NOS ASEGURAMOS DE QUE LOS DATOS SEAN CORRECTOS, SI HAY ALGO MAL DE AHI NO PASA

        $post = new Post;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $destinationPath = 'photos/uploadedphotos/';
            //añado el tiempo para que no se repitan los nombres
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
            $post->photo_path = $destinationPath . $filename;

        }

        $post->title = $validated['title'];
        $post->message = $validated['message'];
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()->route('index')-> with('status', 'Post added');

    }
    public function show($id){
        $post = Post::findOrFail($id);
        return view ('posts.show', compact('post'));
    }


    public function create(){
        return view('posts.create');
    }

    public function edit($id){
        $post = Post::findOrFail($id);

        //para que no podamos editar los posts que no son nuestros
        if ($post->user_id != Auth::user()->id){
            abort(403);
        }

        return view('posts.edit', compact('post'));
        }


    public function update($id, Request $request){
        $post = Post::findOrFail($id);


        //para que no podamos editar los posts que no son nuestros
        if ($post->user_id != Auth::user()->id){
            abort(403);
        }
        $validated = $request->validate([
            'title'=> 'required|min:3',
            'message'=> 'required|min:3',]);

            // dd($request->hasFile('photo'));

            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $destinationPath = 'photos/uploadedphotos/';
                //añado el tiempo para que no se repitan los nombres
                $filename = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
                $post->photo_path = $destinationPath . $filename;

            }

            $post->title = $validated['title'];
            $post->message = $validated['message'];
            $post->user_id = Auth::user()->id;

            $post->save();

            return redirect()->route('index')-> with('status', 'Post edited');

    }
    public function destroy($id){
        if(!Auth::user()->is_admin){
            abort(403, 'Only admins can delete posts');
        }
        $post = Post::findOrFail($id);
        $likes = Like::where('post_id', '=', $post->id)->delete();
        $post->delete();
        return redirect()->route('index')->with('status', 'Post deleted');
    }



}
