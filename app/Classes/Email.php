<?php 

namespace App\Classes;

use App\Interfaces\Writable;
use App\Mail\solicitud;
use Illuminate\Http\Request;

use DB;

class Email implements Writable{
	public function run($request){
		if($this->validate($request)){
			if($this->checkAddressExists($request['email'])){
				$this->write($request['comment']);
			}
		}
	}
	public function validate($request){
		//dd($request);
		if($request){
            $data= request()->validate([
                'name'=>'required',
                 'email'=>'required|max:50|email',
                 'phone'=>'required',
                 'comment'=>'required'
            ],[
                'name.required'=>"El campo nombre es obligatorio",
                'email.max'=>"El campo email no debe ser mayor a 15 caracteres",
                'phone.required'=>"El campo telefono es obligatorio",
                'email.required'=>'El campo email es obligatorio',
                'comment.required'=>'Debes enviar un comentario'
            ]);
            return true;
        }
	}
	public function write(){
		Mail::to('yohanazareth2693@gmail.com')
            ->queue(new solicitud(request()->all()));
	}
	public function checkAddressExists(){
		return true;
	}
}?>