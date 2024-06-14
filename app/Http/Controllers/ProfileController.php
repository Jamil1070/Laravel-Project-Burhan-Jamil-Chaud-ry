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

        //CON ESTO NOS ASEGURAMOS DE QUE LOS DATOS SEAN CORRECTOS, SI HAY ALGO MAL DE AHI NO PASA

        // $post = new Post;
        $user = Auth::user();

        // dd($request->hasFile('photo'));
        if ($user->id !== $request->user()->id) {
            // return redirect()->back()->withErrors('No tienes permiso para realizar esta acción.');
            abort(403, 'You cannot change other users photo');}

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $destinationPath = 'photos/uploadedphotos/';
            //añado el tiempo para que no se repitan los nombres
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
            $user->photo_path = $destinationPath . $filename;

        }

        // $post->title = $validated['title'];
        // $post->message = $validated['message'];
        // $post->user_id = Auth::user()->id;


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

    // dd($request);

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


// public function update_password(Request $request)
// {
//     $request->validate([
//         'old_password' => 'required|min:6',
//         'new_password' => 'required|min:6',
//         'confirm_password' => 'required|min:6|same:new_password',
//     ]);

//     $current_user = auth()->user();

//     $current_user->update([
//         'password' => $request->new_password
//     ]);

//     $current_user->fill(['password' => $request->new_password])->save();

//     $current_user->setAttribute('password', bcrypt($request->new_password));
//     $current_user->save();

//     return redirect()->route('profile', ['username' => $current_user->username])
//              ->with('success', 'Password changed successfully');
// }


public function editProfile(){
    $user = Auth::user();
    return view ('users.editprofile', compact('user'));

}



    public function updateProfile(Request $request)
{
    // Validar los campos del formulario
    $request->validate([
        'username' => 'required',
        'name' => 'required',
        'dateofbirth' => 'nullable',
        'aboutme' => 'nullable|max:200',


    ]);

    // Obtener el usuario autenticado
    $user = auth()->user();

    // Actualizar los campos del usuario
    $user->username = $request->username;
    $user->name = $request->name;
    $user->dateofbirth = $request->dateofbirth;
    $user->aboutme = $request->aboutme;



    // Guardar los cambios en el usuario
    $user->save();

    return redirect()->route('profile', ['username' => Auth::user()->username])->with('success', 'Profile updated successfully');

}
}












