<?php 

namespace App\Classes;

use App\Interfaces\Writable;
use App\Http\Requests\ContactForm;
use App\Mail\contactMail;
use Illuminate\Http\Request;

use DB;

class Email implements Writable{
	public function run(ContactForm $request){
		//i think it gets the validated data.. i am making this like a controller does, but i don't know it it works.
			if($this->checkAddressExists($request['email'])){
				Mail::to('yohanazareth2693@gmail.com')
            ->queue(new contactMail(request()->all()));
			}
	}
	
	public function checkAddressExists(){
		/*
			Check this. How can i verify if the address really exists?
		*/
		return true;
	}
}?>