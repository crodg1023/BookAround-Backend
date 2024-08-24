<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:App\Models\Usuario,email',
            'password' => 'required|min:5',
            'role_id' => 'required|numeric|between:1,2'
        ];
    }

    public function messages() {
        return [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no cumple con el formato correcto',
            'email.unique' => 'Este correo ya se encuentra registrado en la base de datos',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'role_id.required' => 'El ID del rol es obligatorio',
            'role_id.numeric' => 'El ID del rol debe ser numerico',
            'role_id.between' => 'El ID del rol debe corresponder a un ID correcto (1 o 2)',
        ];
    }
}
