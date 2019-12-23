<?php

namespace App\Http\Controllers;

use App\client;
use Carbon\Carbon;

use App\venta;
use App\numsModel;
use Mail;
use App\Mail\solicitud;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class loteryController extends Controller
{
    //
    public function index(){
    	$numbers = numsModel::all();
	    $ganador='';$cedula='';$nums_count='';
    	foreach ($numbers as $number ) {
    		if($number->number=='5'){//igual al numero ganador.. como determinar el numero ganador?
                $ganador = client::where(['id_client'=>$number->id_client])->first();
                $ganador=$ganador->name;
                $cedula=$ganador->cedula;
	    	} 

    	}
        $nums_count=count($numbers);
                //dd($nums_count);
        return view('index',compact('ganador','numbers','cedula','nums_count'));
    }
    public function solicitar(Request $request){
    	/*Como imprimmir un mensaje de "tu mensaje ha sido enviado, en la vista...?mas bonito que un alert"*/
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
        	Mail::to('yohanazareth2693@gmail.com')
            ->queue(new solicitud(request()->all()));
        }
        return redirect()->back();
    }
    /*Listado de numeros participantes para el sorteo. Visible solo al recibir autorizacion del administrador*/
    public function numberForm(){
    	$numbers = numsModel::all(); 
    	return view('numberlist',compact('numbers') );
    }
    /*
		compra de un numero especifico por parte del cliente
    */
    public function comprar(Request $request){

        $data= request()->validate([
            'name'=>'required',
             'email'=>'required|max:15|email',
             'phone'=>'required',
             'cedula'=>'required'
        ],[
            'name.required'=>"El campo nombre es obligatorio",
            'cedula.required'=>"El campo cedula es obligatorio",
            'email.required'=>'El campo email es obligatorio',
            'email.email'=>'El campo email debe contener un @ y un .'
        ]);

        // dd($request);
    	client::create([
    		'name'=>$request['name'],
            'cedula'=>$request['cedula'],
    		'phone'=>$request['phone'],
    		'email'=>$request['email']
    	]);
        $numero=$request['selectednumber'];
    	/*Este valor debe corresponder al ID del ultimo cliente registrado... eso es facil de hacer

		como guardar en la venta el ID del ultimo numero guardado?

    	*/
    	
    	numsModel::create([
    		'number'=>$numero,
    		'status'=>'1',
            'id_client'=>'1',
    	]);
    	venta::create([
    		'id_client'=>'1',
    		'fecha'=>$date = Carbon::now(),
    		'id_num'=>$numero,
    		'status'=>'1'
    	]);

        $pdf = PDF::loadView('ticket', compact('numero'));
        return $pdf->download('ticket.pdf');
    }
    // public function winner(){
    	/*
    	---Como hago que se ejecute esto en una fecha determinada? con un CronJob? Pero en el mismo index? que se ejecute en la fecha que diga el administrador...s
    	---Determinar el ganador
		---Como lo hago? Enviar texto con el ganador a la vista de Index.
    	*/
    // }
}
