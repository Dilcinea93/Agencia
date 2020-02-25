<?php

namespace App\Http\Controllers;

use Redirect,Response;
use App\Event;
use App\Events\OrderShipped;
use App\lotteries;
use App\client;
use App\numsModel;
use App\venta;
use App\Classes\generarPdf;
use Illuminate\Http\Request;

/**
    This controller manages the event organization
*/
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('event.index', [
            'events'     => event::all(),
            'lotteries'=> lotteries::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = Event::create($request->all());
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('event.show',[
            'numbers'     => numsModel::all(),
            'event'=> Event::where('id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('event.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $event = Event::find($id);
        $event->update($request->all());
        return redirect('/events/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $event = Event::find($id)->delete();
        return redirect('/events');
    }
/*******************************************/


    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function numberForm($id){
        $numbers = numsModel::all(); 
        return view('numberlist',compact('numbers','id'));
    }

    public function comprar(Request $request){

        if(isset($request)){
        // $data= request()->validate([
        //     'id'=>'required',
        //      'cedula'=>'required',
        //      'name'=>'required',
        //      'id_num'=>'required',
        //      'email'=>'required',
        //      'phone'=>'required',
        // ]);
        $client = client::create($request->all());
        $selected= $request['id_num'];
        $nums= numsModel::find($selected);
        $nums->id_client=$client->id;
        $nums->save();

/*Hacer funcionar el observador*/
        // \App\client::observe(\App\Observers\sellObserver::class);
        event(new OrderShipped($client,$nums,$request['id_event']));
        $this->imprimir($selected);
        return redirect(route('index'));
        }else{
            echo "Error en los datos";
//como mostrar una excepcion
        }
    }
    public function eventList(){
        return view('event.eventos', [
            'events'     => Event::all()
        ]);
    }
    public function imprimir($selected){
        $pdf= new generarPDF();
        $pdf->createPdf($selected);
    }


    /**********************************/

    // Estoy probando esto desde aqui porque no puedo ingresar al sistema... esto es de HomeController [22/02/2020]
    /**********************************/


    public function indexHome()
    {
        $ventas=venta::all();
        $nums= numsModel::all();
        $faltan=0;
        $incomings= $this->incomings();
        foreach ($nums as $value) {
            if($value->id_client==null){
                $faltan=+1;
            }
        }
        return view('home',compact('ventas','faltan','incomings'));
    }
    public function incomings(){
        $ventas= venta::all();
        $incoming=0;
        foreach($ventas as $venta){
            $incoming+=$venta->amount;
        }
        return $incoming;
    }
}
