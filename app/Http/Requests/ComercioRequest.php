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
            'usuario_id' => 'required|numeric|min:1',
            'name' => 'required|min:8',
            'address' => 'required|min:10',
            'city' => 'required|min:1|alpha:ascii',
            'country' => 'required|min:4|alpha:ascii',
            'description' => 'required|between:20,255',
            'score' => 'required|numeric|between:0,5'
        ];
    }

    public function messages() {
        return [
            'usuario_id.required' => 'El comercio debe estar asociado a un usuario valido',
            'usuario_id.numeric' => 'El ID debe ser numerico',
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe tener al menos 8 caracteres',
            'address.required' => 'La direccion es obligatoria',
            'address.min' => 'La direccion debe tener al menos 10 caracteres',
            'city.required' => 'La ciudad es obligatoria',
            'city.min' => 'El nombre de la ciudad debe contar con al menos 1 caracter',
            'city.alpha'=> 'El nombre de la ciudad solo puede contener letras',
            'country.required' => 'El pais es obligatorio',
            'country.min' => 'El nombre del pais debe ser de al menos 4 caracteres',
            'country.alpha' => 'El nombre del pais solo puede contener letras',
            'description.required' => 'La descripcion es obligatoria',
            'description.between' => 'La descripcion debe tener entre 20 y 255 caracteres',
            'score.required' => 'El puntaje es obligatorio',
            'score.numeric' => 'El puntaje solo puede contener numeros',
            'score.between' => 'El valor del puntaje debe estar entre 0 y 5'
        ];
    }
}
