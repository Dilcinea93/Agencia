<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestV extends FormRequest
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
             'cedula'=>'required|integer',
             'name'=>'required',
             'id_num'=>'required',
             'email'=>'required|email',
             'phone'=>'required',
        ];
    }

    public function messages(){
        return [
             'cedula.required'=>'El campo cedula es requerido',
             'cedula.integer'=>'El campo cédula solo debe contener dígitos',
             'name.required'=>'Porfavor necesitamos tu nombre',
             'id_num.required'=>'Porfavor selecciona un número',
             'email.required'=>'Porfavor danos tu :attribute',
             'phone.required'=>'Porfavor necesiamos tu número de teléfono.',
        ];
    }
}
