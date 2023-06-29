<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuentaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user' => 'required|min:3|max:20|unique:cuentas,user',
            'password' => 'required|min:6',
            'nombre' => 'required|min:3|max:20',
            'apellido' => 'required|min:3|max:20'
        ];
    }

    public function messages(){
        return [
            'user.required' => 'Indique nombre de usuario',
            'user.min' => 'El usuario debe tener como mínimo 3 caracteres',
            'user.max' => 'El usuario debe tener como máximo 20 caracteres',
            'user.unique' => 'Ya existe un usuario :input',
            'password.required' => 'La clave es campo requerido',
            'password.min' => 'La clave debe contener como minimo 6 caracteres',
            'nombre.required' => 'Indique nombre',
            'nombre.min' => 'El nombre debe tener como mínimo 3 caracteres',
            'nombre.max' => 'El nombre debe tener como máximo 20 caracteres',
            'apellido.required' => 'Indique el apellido',
            'apellido.min' => 'El apellido debe tener como mínimo 3 caracteres',
            'apellido.max' => 'El apellido debe tener como máximo 20 caracteres'
        ];
    }
}
