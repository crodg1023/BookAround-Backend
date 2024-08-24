<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitaRequest extends FormRequest
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
            'date_time' => 'required|date|after_or_equal:now'
        ];
    }

    public function messages() {
        return [
            'comercio_id.required' => 'El ID del comercio es obligatorio',
            'comercio_id.numeric' => 'El ID del comercio debe ser numerico',
            'comercio_id.min' => 'El ID del comercio deber ser un identificador valido',
            'cliente_id.required' => 'El ID del cliente es obligatorio',
            'cliente_id.numeric' => 'El ID del cliente debe ser numerico',
            'cliente_id.min' => 'El ID del cliente deber ser un identificador valido',
            'date_time.required' => 'La fecha y hora son obligatorias',
            'date_time.date' => 'La fecha y la hora deben ser un formato valido',
            'date_time.after_or_equal' => 'La fecha y hora deben ser igual o posteriores al momento de la peticion'
        ];
    }
}
