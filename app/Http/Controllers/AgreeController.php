<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agree;
use App\Models\Disagree;
use App\Models\Opinion;
use Illuminate\Support\Facades\Auth;

class AgreeController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

//     public function agree($opinionId, Request $request)
// {
//     $opinion = Opinion::findOrFail($opinionId);

//     if ($opinion->user_id == Auth::user()->id) {
//         abort(403, 'You cannot agree with your own message');
//     }

//     $agree = Agree::where('opinion_id', '=', $opinionId)->where('user_id', '=', Auth::user()->id)->first();

//     if ($agree != NULL) {
//         abort(403, 'You cannot agree with an opinion more than once');
//     }

//     $agree = new Agree;
//     $agree->user_id = Auth::user()->id;
//     $agree->opinion_id = $opinionId;
//     $agree->save();

//     $question = $opinion->question;


//     // dd($question);

//     if ($question) {
//         $opinions = Opinion::where('question_id', $question->id)->latest()->get();
//         return view('questions.show', compact('question', 'opinions'))->with('status', 'YOU AGREE WITH THIS OPINION');
//     } else {
//         abort(404, 'Question not found');
//     }
// }


public function agree($opinionId, Request $request)
{
    $opinion = Opinion::findOrFail($opinionId);

    if ($opinion->user_id == Auth::user()->id) {
        abort(403, 'You cannot agree with your own message');
    }

    $agree = Agree::where('opinion_id', '=', $opinionId)->where('user_id', '=', Auth::user()->id)->first();

    if ($agree != NULL) {
        abort(403, 'You cannot agree with an opinion more than once');
    }

    $disagree = Disagree::where('opinion_id', '=', $opinionId)->where('user_id', '=', Auth::user()->id)->first();

    if ($disagree != NULL) {
        $disagree->delete();
    }

    $agree = new Agree;
    $agree->user_id = Auth::user()->id;
    $agree->opinion_id = $opinionId;
    $agree->save();


    $opinion->save();

    $question = $opinion->question;

    if ($question) {
        $opinions = Opinion::where('question_id', $question->id)->latest()->get();
        return view('questions.show', compact('question', 'opinions'))->with('status', 'YOU AGREE WITH THIS OPINION');
    } else {
        abort(404, 'Question not found');
    }
}

}
