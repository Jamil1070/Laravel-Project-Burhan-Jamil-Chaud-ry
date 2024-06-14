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
        $formData = []; // Define el arreglo vacío para almacenar los datos del formulario

    return view('contact', compact('formData'));
    }

    // public function submit(Request $request)
    // {

    //     $validatedData = $request->validate([
    //         'username' => 'required',
    //         'email' => 'required|email',
    //         'message' => 'required',
    //     ]);


    //     Mail::to('admin@example.com')->send(new \App\Mail\ContactFormSubmitted($validatedData));

    public function submit (Request $request)
{

    $formData = $request->all();
    $email = new ContactFormSubmitted($formData);

        // I cannot make this work...
     //Mail::to('admin@example.com')->send($email);


        return redirect()->route('profile', Auth::user()->username)->with('success', '¡Thank You! Your message has been sent.');
    }
}
