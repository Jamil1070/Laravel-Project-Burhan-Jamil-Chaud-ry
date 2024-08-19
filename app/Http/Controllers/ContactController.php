<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //


    public function show()
    {
        $formData = []; 

    return view('contact', compact('formData'));
    }

   


    

    public function submit (Request $request)
{

    $formData = $request->all();
    $email = new ContactFormSubmitted($formData);

      


        return redirect()->route('profile', Auth::user()->username)->with('success', '¡Thank You! Your message has been sent.');
    }
}
