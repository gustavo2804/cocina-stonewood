<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveArticuloRequest extends FormRequest
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
            'nombre_articulo' => ['required'],
            'precio' => ['required','integer','min:1'],
            'precio_venta' => ['required','integer','min:1']
        ];
    }
}
