<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

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
            'nom_cliente' => 'required|string|max:255',
            'apellido_cliente' => 'required|string|max:255',
            'dir_cliente' => 'required|string|max:255',
            'tel_cliente' => 'required|string|max:255',
            'email_cliente' => 'required|string|email|max:255|unique:clientes,email_cliente',
        ];
    }

    public function messages()
    {
        return [
            'nom_cliente.required' => 'El nombre del cliente es requerido.',
            'nom_cliente.string' => 'El nombre del cliente debe ser una cadena de caracteres.',
            'nom_cliente.max' => 'El nombre del cliente debe tener máximo :max caracteres.',

            'apellido_cliente.required' => 'El apellido del cliente es requerido.',
            'apellido_cliente.string' => 'El apellido del cliente debe ser una cadena de caracteres.',
            'apellido_cliente.max' => 'El apellido del cliente debe tener máximo :max caracteres.',

            'dir_cliente.required' => 'La dirección del cliente es requerida.',
            'dir_cliente.string' => 'La dirección del cliente debe ser una cadena de caracteres.',
            'dir_cliente.max' => 'La dirección del cliente debe tener máximo :max caracteres.',

            'tel_cliente.required' => 'El teléfono del cliente es requerido.',
            'tel_cliente.string' => 'El teléfono del cliente debe ser una cadena de caracteres.',
            'tel_cliente.max' => 'El teléfono del cliente debe tener máximo :max caracteres.',

            'email_cliente.required' => 'El correo electrónico del cliente es requerido.',
            'email_cliente.string' => 'El correo electrónico del cliente debe ser una cadena de caracteres.',
            'email_cliente.email' => 'El correo electrónico del cliente debe ser una dirección de correo electrónico válida.',
            'email_cliente.max' => 'El correo electrónico del cliente debe tener máximo :max caracteres.',
            'email_cliente.unique' => 'Ya existe un cliente con este correo electrónico.',
        ];
    }
}
