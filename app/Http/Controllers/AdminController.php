<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    //

    public function adminPanel()
    {
        $users = User::all();

        // dd($users);

        return view('administrator.adminpage', compact('users'));
    }

//     public function adminPanel()
// {
//     try {
//         $users = User::all();

//         dd($users);

//         return view('administrator.adminpage', compact('users'));
//     } catch (\Exception $e) {
//         // Manejo de la excepción
//         dd($e); // Puedes imprimir la excepción para ver detalles del error
//     }
// }



    public function update(User $user, Request $request)
{
    $user->is_admin = $request->input('is_admin');
    $user->save();
    return redirect()->route('admin.panel')->with('status', 'Admin status updated successfully');

}



}
