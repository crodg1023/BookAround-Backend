<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'comercio_id' => 'required|numeric|min:1',
            'cliente_id' => 'required|numeric|min:1',
            'score' => 'required|numeric|between:0,5',
            'content' => 'required|between:20,255'
        ];
    }

    public function messages() {
        return [
            'comercio_id.required' => 'El ID del comercio es obligatorio',
            'comercio_id.numeric' => 'El ID del comercio debe ser numerico',
            'comercio_id.min' => 'El ID del comercio debe corresponder a un identificador valido',
            'cliente_id.required' => 'El ID del cliente es obligatorio',
            'cliente_id.numeric' => 'El ID del cliente debe ser numerico',
            'cliente_id.min' => 'El ID del cliente debe corresponder a un identificador valido',
            'score.required' => 'El puntaje es obligatorio',
            'score.numeric' => 'El puntaje debe ser numerico',
            'score.between' => 'El puntaje debe estar entre 0 y 5',
            'content.required' => 'El contenido es obligatorio',
            'content.between' => 'La longitud del contenido debe estar entre 20 y 255 caracteres'
        ];
    }
}
