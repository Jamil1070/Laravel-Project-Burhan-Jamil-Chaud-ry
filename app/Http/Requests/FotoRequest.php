<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


use Illuminate\Http\Request;
class FotoRequest extends FormRequest
{

public function uploadPhoto(Request $request)
{
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('photos');
        // Guardar el camino a la foto en la base de datos o hacer lo que necesites
    }

    // Redirigir o retornar una respuesta según tus necesidades
}



    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
