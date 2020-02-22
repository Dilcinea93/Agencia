<?php

namespace App\Http\Controllers;

use Redirect,Response;
use App\Event;
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
        $event = new event($request->all());
        $event->save();
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
            'numbers'     => numbers::all(),
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
    public function numberForm(){
        $numbers = numsModel::all(); 
        return view('numberlist',compact('numbers'));
    }

    public function comprar(Request $request){

        if(isset($request)){
        $data= request()->validate([
            'id_num'=>'required',
             'cedula'=>'required',
             'name'=>'required',
             'email'=>'required',
             'phone'=>'required',
        ]);
        $client = client::create($request->all());
        $selected= $request['id_num'];
        $nums= numsModel::find($selected);
        $nums->id_client=$client->id;
        $nums->save();


        \App\client::observe(\App\Observers\sellObserver::class);
        $this->imprimir($selected);
        // return redirect(route('index'));
        return Response::json($client);
        }else{
            echo "Error en los datos";
            //como mostrar una excepcion
        }
    }
    public function eventList(){
        return view('event.eventos', [
            'sorteos'     => Event::all()
        ]);
    }
    public function imprimir($selected){
        $pdf= new generarPDF();
        $pdf->createPdf($selected);
    }
}
