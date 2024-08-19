<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;







class ProfileController extends Controller
{
    //
    public function show(){
        return view('auth.home.profile');
    }
    public function store (Request $request){
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',         ]);

        

       
        $user = Auth::user();

       
        if ($user->id !== $request->user()->id) {
           
            abort(403, 'You cannot change other users photo');}

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $destinationPath = 'photos/uploadedphotos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
            $user->photo_path = $destinationPath . $filename;

        }

        


        $user->save();


        return redirect()->route('profile', Auth::user()->username)-> with('status', 'Photo added');


}
public function change_password(){
    return view ('auth.passwords.change');

}


public function update_password(Request $request)
{
    $request->validate([
        'old_password' => 'required|min:6',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|min:6|same:new_password',
    ]);

    $current_user = auth()->user();

    

    if (Hash::check($request->old_password, $current_user->password)) {
        $current_user->update([
            'password' => ($request->new_password)
        ]);

        return redirect()->route('profile', ['username' => $current_user->username])
            ->with('success', 'Password changed successfully');
    } else {
        return back()->withErrors(['old_password' => 'Incorrect old password']);
    }
}





public function editProfile(){
    $user = Auth::user();
    return view ('users.editprofile', compact('user'));

}



    public function updateProfile(Request $request)
{
    
    $request->validate([
        'username' => 'required',
        'name' => 'required',
        'dateofbirth' => 'nullable',
        'aboutme' => 'nullable|max:200',


    ]);

    
    $user = auth()->user();

   
    $user->username = $request->username;
    $user->name = $request->name;
    $user->dateofbirth = $request->dateofbirth;
    $user->aboutme = $request->aboutme;



  
    $user->save();

    return redirect()->route('profile', ['username' => Auth::user()->username])->with('success', 'Profile updated successfully');

}
}












