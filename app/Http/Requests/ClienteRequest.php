<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'name' => 'required|alpha:ascii|between:3,50',
            'usuario_id' => 'required|numeric|min:1'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.alpha' => 'El nombre solo puede contener letras',
            'name.between' => 'La longitud del nombre debe estar entre 3 y 50 caracteres',
            'usuario_id.required' => 'El ID del usuario es obligatorio',
            'usuario_id.numeric' => 'El ID del usuario debe ser numerico',
            'usuario_id.min' => 'El ID del usuario debe corresponder a un identificador valido'
        ];
    }
}
