<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sorteo;
use App\venta;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ventas=venta::all();
        /*contar cuantas ventas se han hecho*/
        return view('home',compact('ventas'));
    }
    public function nuevo_evento(Request $request){
        $data= request()->all();
        sorteo::create([
            'name'=>$data['name'],
            'lottery'=>$data['lottery'],
            'date'=>$data['date'],
            'time'=>$data['time'],
            'award'=>$data['award']
        ]);
        return redirect()->back();
    }
    /*
        registrar evento nuevo
        Estadistica. Listado de ventas, cuantos faltan por vender, 
        

    */
}
