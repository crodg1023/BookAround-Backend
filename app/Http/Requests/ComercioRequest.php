<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComercioRequest extends FormRequest
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
            'usuario_id' => 'required|exists:usuarios,id',
            'name' => 'required|min:1',
            'address' => 'required|min:1',
            'phone' => 'required|numeric',
            'workingHours' => 'required',
            'description' => 'required|min:1'
        ];
    }

    public function messages() {
        return [
            'usuario_id.required' => 'El comercio debe estar asociado a un usuario valido',
            'usuario_id.numeric' => 'El ID debe ser numerico',
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe tener al menos 5 caracteres',
            'address.required' => 'La direccion es obligatoria',
            'address.min' => 'La direccion debe tener al menos 10 caracteres'
        ];
    }
}
