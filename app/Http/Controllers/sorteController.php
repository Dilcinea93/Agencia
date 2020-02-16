<?php

namespace App\Http\Controllers;

use Redirect,Response;
use App\sorteo;
use App\client;
use App\numsModel;
use App\Classes\generarPdf;
use Illuminate\Http\Request;

class sorteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('sorteo.index', [
            'sorteos'     => sorteo::all()
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
        $sorteo = new sorteo($request->all());
        $sorteo->save();
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
        return view('sorteo.show',compact('id'));
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
        return view('sorteo.edit',compact('id'));
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
        $sorteo = sorteo::find($id);
        $sorteo->update($request->all());
        return redirect('/events/sorteo/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sorteo = sorteo::find($id)->delete();
        return redirect('/events/sorteo/');
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
        $this->imprimir($selected);
        return redirect(route('home'));
        }else{
            echo "Error en los datos";
            //como mostrar una excepcion
        }
    }
    public function imprimir($selected){
        $pdf= new generarPDF();
        $pdf->createPdf($selected);
    }
}
