<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use App\Models\Agree;
use App\Models\Disagree;




use Illuminate\Http\Request;

class OpinionController extends Controller
{
    //

     //
//si alguien intenta ir a posts/create sin estar logeado , no lo vamos a dejar
public function __construct(){
    $this->middleware('auth', ['except' =>['index', 'show']]);
}


public function index($id)
{
    $question = Question::findOrFail($id);
    $opinions = Opinion::where('question_id', $id)->latest()->get();

    return view('questions.show', compact('question', 'opinions'));


}



// public function store (Request $request){
//     $validated = $request->validate([
//         'message'=> 'required|min:3',

//     ]);
//     //CON ESTO NOS ASEGURAMOS DE QUE LOS DATOS SEAN CORRECTOS, SI HAY ALGO MAL DE AHI NO PASA

//     $opinion = new Opinion;


//     $opinion->message = $validated['message'];
//     $opinion->user_id = Auth::user()->id;
//     $opinion->question_id =
//     $opinion->save();

//     return view('questions.show', compact('question', 'opinions'))-> with('status', 'Message added');

// }

public function store(Request $request)
{
    $validated = $request->validate([
        'message' => 'required|min:3',
        'question_id' => 'required|exists:questions,id',
    ]);
    $opinion = new Opinion;

    if($request->hasFile('photo')){
        $file = $request->file('photo');
        $destinationPath = 'photos/uploadedphotos/';
        //añado el tiempo para que no se repitan los nombres
        $filename = time() . '-' . $file->getClientOriginalName();
        $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
        $opinion->photo_path = $destinationPath . $filename;

    }

    
    $opinion->message = $validated['message'];
    $opinion->user_id = Auth::user()->id;
    $opinion->question_id = $validated['question_id'];
    $opinion->save();

    // Obtén la pregunta relacionada para pasarla a la vista
    $question = Question::findOrFail($validated['question_id']);
    $opinions = Opinion::where('question_id', $validated['question_id'])->latest()->get();

    return redirect()->route('questions.show', ['question' => $validated['question_id']])->with('status', 'Message added');
}


public function show($id){
    $opinion = Opinion::findOrFail($id);
    return view ('opinion.show', compact('opinion'));
}



public function create($question_id, Request $request)
{
    $question = Question::findOrFail($question_id);



    return view('opinions.create', compact('question'));
}




public function edit($id){
    $opinion = Opinion::findOrFail($id);

    //para que no podamos editar los posts que no son nuestros
    if ($opinion->user_id != Auth::user()->id){
        abort(403);
    }

    return view('opinions.edit', compact('opinion'));
    }


public function update($id, Request $request){
    $opinion = Opinion::findOrFail($id);


    //para que no podamos editar los posts que no son nuestros
    if ($opinion->user_id != Auth::user()->id){
        abort(403);
    }
    $validated = $request->validate([
        'message'=> 'required|min:3',]);

        // dd($request->hasFile('photo'));
        // dd($validated);


        $request->hasFile('photo');
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $destinationPath = 'photos/uploadedphotos/';
            //añado el tiempo para que no se repitan los nombres
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
            $opinion->photo_path = $destinationPath . $filename;

        }

        $opinion->message = $validated['message'];
        $opinion->user_id = Auth::user()->id;

        $opinion->save();

        return redirect()->route('questions.show', ['question' => $opinion->question_id])->with('status', 'Opinion edited');


}
public function destroy($id)
{
    $opinion = Opinion::findOrFail($id);

    if (!Auth::user()->is_admin && $opinion->user_id !== Auth::user()->id) {
        abort(403, 'Only admins and the owner of the opinion can delete it');
    }

    $questionId = $opinion->question_id;

    $opinion->delete();

    $question = Question::findOrFail($questionId);

    return redirect()->route('questions.show', ['question' => $question])->with('status', 'Opinion deleted');
}



}
