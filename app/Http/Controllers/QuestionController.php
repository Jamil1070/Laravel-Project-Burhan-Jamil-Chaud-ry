<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Opinion;
use App\Models\Agree;
use App\Models\Disagree;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }

    public function index (){
        $questions = Question::latest()->get();

        return view ('questions.index',compact ('questions'));
    }



    public function store (Request $request){
        $validated = $request->validate([
            'title'=> 'required|min:3',
            'message'=> 'required|min:3',

        ]);
        //CON ESTO NOS ASEGURAMOS DE QUE LOS DATOS SEAN CORRECTOS, SI HAY ALGO MAL DE AHI NO PASA

        $question = new Question;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $destinationPath = 'photos/uploadedphotos/';
            //añado el tiempo para que no se repitan los nombres
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
            $question->photo_path = $destinationPath . $filename;

        }

        $question->title = $validated['title'];
        $question->message = $validated['message'];
        $question->user_id = Auth::user()->id;
        $question->save();

        return redirect()->route('questions.index')-> with('status', 'Question added');

    }
    // public function show($id){
    //     $question = Question::findOrFail($id);
    //     return view ('questions.show', compact('question'));
    // }
    public function show($id)
{
    $question = Question::findOrFail($id);
    $opinions = Opinion::where('question_id', $id)->latest()->get();

    return view('questions.show', compact('question', 'opinions'));
}


    public function create(){
        return view('questions.create');
    }

    public function edit($id){
        $question = Question::findOrFail($id);

        //para que no podamos editar los posts que no son nuestros
        if ($question->user_id != Auth::user()->id){
            abort(403);
        }

        return view('questions.edit', compact('question'));
    }


    public function update($id, Request $request){
        $question = Question::findOrFail($id);


        //para que no podamos editar los posts que no son nuestros
        if ($question->user_id != Auth::user()->id){
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
                $question->photo_path = $destinationPath . $filename;

            }

            $question->title = $validated['title'];
            $question->message = $validated['message'];
            $question->user_id = Auth::user()->id;

            $question->save();

            return redirect()->route('questions.index')-> with('status', 'Question edited');

    }
    public function destroy($id){
        if(!Auth::user()->is_admin){
            abort(403, 'Only admins can delete posts');
        }
        $question = Question::findOrFail($id);
        // $likes = Like::where('post_id', '=', $post->id)->delete();
        $question->delete();
        return redirect()->route('questions.index')->with('status', 'Question deleted');
    }

}
