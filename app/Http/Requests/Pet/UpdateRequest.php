<?php

namespace App\Http\Requests\Pet;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'nom_mascota' => 'required|string|max:50',
            'Raza' => 'nullable|string|max:50',
            'especie' => 'nullable|string|max:50',
            'vacunas_mascota' => 'nullable|string|max:255',
            'fechaN_mascota' => 'nullable|date',
            'cliente_id' => [
                'nullable',
                Rule::exists('clients_collection', '_id')->where(function ($query) {
                    $query->where('_id', $this->input('cliente_id'));
                }),
            ],
        ];
    }
    public function messages()
    {
        return [
            'nom_mascota.required' => 'El nombre de la mascota es requerido.',
            'nom_mascota.string' => 'El nombre de la mascota debe ser una cadena de texto.',
            'nom_mascota.max' => 'El nombre de la mascota no debe exceder los 50 caracteres.',
            'Raza.string' => 'La raza debe ser una cadena de texto.',
            'Raza.max' => 'La raza no debe exceder los 50 caracteres.',
            'especie.string' => 'La especie debe ser una cadena de texto.',
            'especie.max' => 'La especie no debe exceder los 50 caracteres.',
            'vacunas_mascota.string' => 'Las vacunas deben ser una cadena de texto.',
            'vacunas_mascota.max' => 'Las vacunas no deben exceder los 255 caracteres.',
            'fechaN_mascota.date' => 'La fecha de nacimiento de la mascota debe ser una fecha válida.',
            'cliente_id.exists' => 'El ID del cliente proporcionado no existe.',
        ];
    }
}
