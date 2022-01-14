<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidationRequest extends FormRequest
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
            'producto' => 'required',
            // 'descripcion' =>'alpha_num',
            'precio' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'supermercado' => 'required', 
            'descripcion' => 'nullable',   
        ];
    }

    public function messages()
    {
        return [

            'producto.required'   => 'El campo :attribute es obligatorio.',
            'producto.regex:/^[\pL\s\-]+$/u' => 'El nombre del :attribute debe contener texto.',

            // 'descripcion.regex:/^[\pL\s\-]+$/u' => 'El :attribute debe contener texto.',
     
            'precio.required'   => 'Debe colocar :attribute es obligatorio.',
            'precio.numeric'   => 'El :attribute debe tener solo numeros.',

            'supermercado.required'   => 'Debe seleccionar un supermercado',

        ];
    }
}
