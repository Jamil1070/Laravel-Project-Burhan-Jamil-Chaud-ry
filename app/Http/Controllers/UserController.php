<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;




class UserController extends Controller
{
    //

    public function profile($username){
        $user = User::where('username', '=', $username)->firstOrFail();
        return view('users.profile', compact('user'));
    }

    
   
}
