<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Disagree;
use App\Models\Agree;

use App\Models\Opinion;
use Illuminate\Support\Facades\Auth;


class DisagreeController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function disagree($opinionId, Request $request)
{
    $opinion = Opinion::findOrFail($opinionId);

    if ($opinion->user_id == Auth::user()->id) {
        abort(403, 'You cannot disagree with your own message');
    }

    $disagree = Disagree::where('opinion_id', '=', $opinionId)->where('user_id', '=', Auth::user()->id)->first();

    if ($disagree != NULL) {
        abort(403, 'You cannot disagree with an opinion more than once');
    }

    $agree = Agree::where('opinion_id', '=', $opinionId)->where('user_id', '=', Auth::user()->id)->first();

    if ($agree != NULL) {
        $agree->delete();
    }

    $disagree = new Disagree;
    $disagree->user_id = Auth::user()->id;
    $disagree->opinion_id = $opinionId;
    $disagree->save();


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
