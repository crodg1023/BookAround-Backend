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
            'comercio_id' => 'required|exists:comercios,id',
            'cliente_id' => 'exists:clientes,id',
            'dateTime' => 'required|date|after_or_equal:now',
            'people' => 'required|integer|min:1|max:10',
            'reservation_email' => 'required|email:rfc'
        ];
    }

    public function messages() {
        return [
            'comercio_id.required' => 'El ID del comercio es obligatorio',
            'cliente_id.required' => 'El ID del cliente es obligatorio',
            'date_time.required' => 'La fecha y hora son obligatorias',
            'date_time.date' => 'La fecha y la hora deben ser un formato valido',
            'date_time.after_or_equal' => 'La fecha y hora deben ser igual o posteriores al momento de la peticion'
        ];
    }
}
