<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQQuestion;
use App\Models\FAQCategory;
use Illuminate\Support\Facades\Auth;

class FAQCategoryController extends Controller
{
    //


    public function __construct(){
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }


    public function index()
{
    $f_a_q_categories = FAQCategory::latest()->get();

    return view('f_a_q_categories.index', compact('f_a_q_categories'));
}


    public function store (Request $request){
        $validated = $request->validate([
            'name'=> 'required|min:3',

        ]);
        //CON ESTO NOS ASEGURAMOS DE QUE LOS DATOS SEAN CORRECTOS, SI HAY ALGO MAL DE AHI NO PASA

        $f_a_q_categorie = new FAQCategory;


        $f_a_q_categorie->name = $validated['name'];

        $f_a_q_categorie->save();

        return redirect()->route('f_a_q_categories.index')-> with('status', 'Category added');

    }

    public function show($id)
{
    $f_a_q_categorie = FAQCategory::findOrFail($id);
    $f_a_q_questions = $f_a_q_categorie->f_a_q_questions()->latest()->get();

    return view('f_a_q_categories.show', compact('f_a_q_categorie', 'f_a_q_questions'));
}




    public function create(){
        return view('f_a_q_categories.create');
    }

    public function edit($id){
        $f_a_q_categorie = FAQCategory::findOrFail($id);

        //para que no podamos editar los posts que no son nuestros
        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can edit categories');
        }


        return view('f_a_q_categories.edit', compact('f_a_q_categorie'));
    }


    public function update($id, Request $request){
        $f_a_q_categorie = FAQCategory::findOrFail($id);


        //para que no podamos editar los posts que no son nuestros
        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can edit categories');
        }

        $validated = $request->validate([
            'name'=> 'required|min:3',
            ]);



            $f_a_q_categorie->name = $validated['name'];

            $f_a_q_categorie->save();

            return redirect()->route('f_a_q_categories.index')-> with('status', 'Category edited');

    }
    public function destroy($id)
    {
        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can delete categories');
        }

        $f_a_q_categorie = FAQCategory::findOrFail($id);
        $f_a_q_categorie->f_a_q_questions()->delete();
        $f_a_q_categorie->delete();

        return redirect()->route('f_a_q_categories.index')->with('status', 'Category deleted');
    }


}
