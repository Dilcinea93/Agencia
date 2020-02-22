<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sorteo;
use App\numsModel;
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
        $nums= numsModel::all();
        $faltan='';
        $incoming= $this->incomings();
        foreach ($nums as $value) {
            if($value->id_client==null){
                $faltan=+1;
            }
        }
        return view('home',compact('ventas','faltan','incoming'));
    }
    public function incomings(){
        $ventas= venta::all();
        foreach($ventas as $venta){
            $incoming+=$venta->amount;
        }
        return $incoming;
    }
}
