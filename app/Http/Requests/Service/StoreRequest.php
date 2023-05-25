<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreRequest extends FormRequest
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
            'nom_servicio' => 'required|string|max:50',
            'desc_servicio' => 'nullable|string',
            'cost_servicio' => 'required|numeric|min:0',
            'dur_servicio' => 'required|integer|min:1',
            'mascota_id' => [
                'required',
                Rule::exists('pets_collection', '_id')->where(function ($query) {
                    $query->where('_id', $this->input('mascota_id'));
                }),
            ],
            'category_id' => [
                'required',
                Rule::exists('categories_collection', '_id')->where(function ($query) {
                    $query->where('_id', $this->input('category_id'));
                }),
            ],
            'estado' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'nom_servicio.required' => 'El nombre del servicio es requerido.',
            'nom_servicio.string' => 'El nombre del servicio debe ser una cadena de texto.',
            'nom_servicio.max' => 'El nombre del servicio no debe exceder los 50 caracteres.',
            'desc_servicio.string' => 'La descripción del servicio debe ser una cadena de texto.',
            'cost_servicio.required' => 'El costo del servicio es requerido.',
            'cost_servicio.numeric' => 'El costo del servicio debe ser un valor numérico.',
            'cost_servicio.min' => 'El costo del servicio no puede ser menor a 0.',
            'dur_servicio.required' => 'La duración del servicio es requerida.',
            'dur_servicio.integer' => 'La duración del servicio debe ser un número entero.',
            'dur_servicio.min' => 'La duración del servicio no puede ser menor a 1.',
            'mascota_id.required' => 'El ID de la mascota es requerido.',
            'mascota_id.exists' => 'El ID de la mascota proporcionada no existe.',
            'category_id.required' => 'El ID de la categoria es requerido.',
            'category_id.exists' => 'El ID de la categoria proporcionada no existe.',
            'estado.string' => 'debe ser una cadena de texto', 
        ];
    }
}
