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

    // //para la foto de perfil
    // public function photo(){

    //     return view('user.photo');
    // }
    // public function updatePhoto(Request $request){
    //     $rules = ['image' => 'required|image|max:1024*1024*1',];
    //     $messages = [
    //         'image.required' => 'The image is required',
    //         'image.image' => 'Format not valid',
    //         'image.max' => 'Maximum size is 1MB',
    //     ];
    //     $validator = Validator::make($request -> all(), $rules, $messages);

    //     // if ($validator->fails()){
    //     //     return redirect ('profile', Auth::user()->username)->withErrors($validator);

    //     // }else{
    //         $name = Str::random(30) . '-' . $request->file('image')->getClientOriginalName();
    //         $request->file('image')->move('photos', $name);
    //         $user = new User;
    //         return redirect('user') -> with('status', 'Your photo has been updated');
    //     // }
    // }
}
