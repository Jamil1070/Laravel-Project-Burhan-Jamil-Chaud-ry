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

        

        return view('administrator.adminpage', compact('users'));
    }




    public function update(User $user, Request $request)
{
    $user->is_admin = $request->input('is_admin');
    $user->save();
    return redirect()->route('admin.panel')->with('status', 'Admin status updated successfully');

}



}
