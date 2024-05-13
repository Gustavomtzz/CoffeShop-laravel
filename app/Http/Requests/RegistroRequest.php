<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegistroRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(8)->letters()->numbers()
            ]

        ];
    }

    public function messages()
    {
        return [
            'name.required' => "El nombre es obligatorio",
            'name.max' => "El nombre no puede contener mas de 255 caracteres",
            'email.required' => "El email es Obligatorio",
            'email.unique' => "El Usuario ya esta registrado",
            'email.email' => "El email debe ser un email válido",
            'password' => "El password debe tener al menos 8 caracteres incluidos letras y numeros",

        ];
    }
}
