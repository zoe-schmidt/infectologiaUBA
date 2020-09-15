<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvitadosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "contrasena" => "required|confirmed|min:8",
        ];
    }

    public function messages()
{
    return [
        'required' => 'El campo no puede estar vacio.',
        'confirmed' => 'Las contraseñas no coinciden',
        'min' => 'La contraseña debe tener minimo 8 caracteres'
    ];
}
}
