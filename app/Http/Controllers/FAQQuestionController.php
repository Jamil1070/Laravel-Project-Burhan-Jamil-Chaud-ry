<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQQuestion;
use App\Models\FAQCategory;
use Illuminate\Support\Facades\Auth;

class FAQQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index($id)
    {
        $f_a_q_categorie = FAQCategory::findOrFail($id);
        $f_a_q_questions = $f_a_q_categorie->f_a_q_questions()->latest()->get();

        return view('f_a_q_categories.show', compact('f_a_q_categorie', 'f_a_q_questions'));
    }

    public function store(Request $request)
    {
        // dd($request);
        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can add questions');
        }

        $validated = $request->validate([
            'question' => 'required|min:3',
            'answer' => 'required|min:3',
            'f_a_q_categorie_id' => 'required|exists:f_a_q_categories,id',
        ]);


        $f_a_q_question = new FAQQuestion;
        $f_a_q_question->question = $validated['question'];
        $f_a_q_question->answer = $validated['answer'];
        $f_a_q_question->f_a_q_categorie_id = $validated['f_a_q_categorie_id'];
        $f_a_q_question->save();

        return redirect()->route('f_a_q_categories.show', ['f_a_q_category' => $validated['f_a_q_categorie_id']])->with('status', 'FAQ added');

        // return redirect()->route('f_a_q_categories.show', ['id' => $validated['f_a_q_categorie_id']])->with('status', 'FAQ added');
    }

    public function create($f_a_q_categorie_id)
    {
        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can add questions');
        }

        $f_a_q_categorie = FAQCategory::findOrFail($f_a_q_categorie_id);

        return view('f_a_q_questions.create', compact('f_a_q_categorie'));
    }



    public function edit($id)
    {
        $f_a_q_question = FAQQuestion::findOrFail($id);

        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can edit questions');
        }

        return view('f_a_q_questions.edit', compact('f_a_q_question'));
    }


    public function update($id, Request $request)
 {

    $f_a_q_question = FAQQuestion::findOrFail($id);


    if (!Auth::user()->is_admin) {
        abort(403, 'Only admins can edit questions');
    }

    // dd($request);
    $validated = $request->validate([
        'question' => 'required|min:3',
        'answer' => 'required|min:3',

    ]);


    $f_a_q_question->question = $validated['question'];
    $f_a_q_question->answer = $validated['answer'];

    $f_a_q_question->save();


    return redirect()->route('f_a_q_categories.show', ['f_a_q_category' => $f_a_q_question->f_a_q_categorie_id])->with('status', 'FAQ edited');

}


    // public function destroy($id)
    // {
    //     $f_a_q_question = FAQQuestion::findOrFail($id);

    //     if (!Auth::user()->is_admin) {
    //         abort(403, 'Only admins can delete FAQs');
    //     }

    //     $f_a_q_categorie_id = $f_a_q_question->f_a_q_categorie_id;

    //     $f_a_q_question->delete();

    //     return redirect()->route('f_a_q_categories.show', ['id' => $f_a_q_categorie_id])->with('status', 'FAQ deleted');
    // }

    public function destroy($id)
{
    $f_a_q_question = FAQQuestion::findOrFail($id);

    if (!Auth::user()->is_admin) {
        abort(403, 'Only admins can delete FAQs');
    }

    $f_a_q_categorie_id = $f_a_q_question->f_a_q_categorie_id;

    $f_a_q_question->delete();

    return redirect()->route('f_a_q_categories.show', ['f_a_q_category' => $f_a_q_categorie_id])->with('status', 'FAQ deleted');
}

}

