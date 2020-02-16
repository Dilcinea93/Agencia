<?php

namespace App\Http\Controllers;

use App\client;
use Carbon\Carbon;

use App\venta;
use App\sorteo;
use App\numsModel;
use Mail;
use App\Classes\Event;
use App\Classes\Email;
use Illuminate\Http\Request;

class loteryController extends Controller
{
    //
    public function __construct(){
    }
    public function index(){
        
    	$numbers = numsModel::all();
        
	    // $ganador='';$cedula='';$nums_count='';
    	 // foreach ($numbers as $number ) {
    	// 	if($number->number=='5'){//igual al numero ganador.. como determinar el numero ganador?
     //            $ganador = client::where(['id_client'=>$number->id_client])->first();
     //            $ganador=$ganador->name;
     //            $cedula=$ganador->cedula;
        //dd($number);
	     	// } 

    	// }
     //    $nums_count=count($numbers);
                //dd($nums_count);
         //dd($numbers->number);
        /*Si yo trato de hacer lo que escribi en la linea anterior me va a decir: Property [number] does not exist on this collection instance. porque $umber es una instancia de coleccion, se tiene que recorrer primero para poder acceder a sus propiedades*/
        //dd($numbers);
        /*Tarea: PASAR LA LINEA 41 en una COLECCION a la vista*/
        $sorteo= sorteo::all();
        $modelsorteo= new sorteo();
        //$ganador= $sorteo->getwinner();
        if($modelsorteo->getwinner()!=''){
            //$ganador= $sorteo->getwinner();
           $ganador=$modelsorteo->getwinner();
        }else{
            $ganador='';
        }
        return view('index',compact(
            'sorteo','numbers','ganador'));
    }
    public function solicitar(Request $request){
    	/*Como imprimmir un mensaje de "tu mensaje ha sido enviado, en la vista...?mas bonito que un alert"*/

        $email= new Email();
        $email->run($request);
        // if($request){
        //     $data= request()->validate([
        //         'name'=>'required',
        //          'email'=>'required|max:50|email',
        //          'phone'=>'required',
        //          'comment'=>'required'
        //     ],[
        //         'name.required'=>"El campo nombre es obligatorio",
        //         'email.max'=>"El campo email no debe ser mayor a 15 caracteres",
        //         'phone.required'=>"El campo telefono es obligatorio",
        //         'email.required'=>'El campo email es obligatorio',
        //         'comment.required'=>'Debes enviar un comentario'
        //     ]);
        // 	Mail::to('yohanazareth2693@gmail.com')
        //     ->queue(new solicitud(request()->all()));
        // }
        return redirect()->back();
    }
  
}
