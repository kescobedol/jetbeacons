<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstitucione extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //Valida permisos del usuario que intenta ingresar datos a la aplicación
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //Reglas de validación de campos
    public function rules()
    {
        return [
            'nombre'=> 'required',
            'descripcion'=> 'required',
            'slug' => 'required'
        ];
    }
    public function attributes(){
        return [
            'nombre' => 'Nombre de Institución',
        ];
    }

    //Personalización de mensajes de error
    public function messages(){
        return [
            'descripcion.required' => 'Debe ingresar una descripción de la institución.'
        ];
    }
}
