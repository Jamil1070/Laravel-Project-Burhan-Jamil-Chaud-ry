 <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use App\Models\User;


// class ChangePasswordController extends Controller
// {
//     public function showChangePasswordForm()
//     {
//         return view('auth.passwords.change');
//     }

//     public function changePassword(Request $request)
//     {
//         $request->validate([
//             'current_password' => 'required',
//             'new_password' => 'required|min:8|confirmed',
//         ]);

//         $user = Auth::user();

//         if ($request->current_password, $user->password) {
//             return redirect()->back()->withErrors(['current_password' => 'Incorrect current password']);
//         }

//         $user->password = ($request->new_password);
//         $user->save();

//         return redirect()->route('home')->with('success', 'Password changed successfully');
//     }
// }
