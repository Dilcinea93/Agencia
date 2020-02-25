<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\lotteries;
use App\numsModel;
use App\event;
use Mail;
use App\Classes\text;
use Illuminate\Support\Arr;
use App\Classes\Email;
use Illuminate\Http\Request;

class loteryController extends Controller
{
    //
    public function __construct(){
    }
    public function index(){
        $text= new text();
        $text->getTexts();
        $texts=$text->getTexts();
        $lotteries=lotteries::all();
        return view('index',compact('lotteries','texts'));
    }
    public function request(Request $request){
    	$email= new Email();
        if($email->run($request)){
            //Print message "Your message has been sent"
            return redirect()->back();
        }
    }
    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function numberForm($id){
        $nombre_evento=event::where('id',$id)->first();
        $nombre_evento= $nombre_evento->name;
        $numbers = numsModel::all(); 
        return view('numberlist',compact('numbers','nombre_evento'));
    }
  
}
