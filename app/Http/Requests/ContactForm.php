<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactForm extends FormRequest
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
                'name'=>'required',
                 'email'=>'required|max:50|email',
                 'phone'=>'required',
                 'comment'=>'required'
            ];
    }

    public function messages(){
        return [
                'name.required'=>"El campo nombre es obligatorio",
                'email.max'=>"El campo email no debe ser mayor a 15 caracteres",
                'phone.required'=>"El campo telefono es obligatorio",
                'email.required'=>'El campo email es obligatorio',
                'comment.required'=>'Debes enviar un comentario'
            ];
    }
}
