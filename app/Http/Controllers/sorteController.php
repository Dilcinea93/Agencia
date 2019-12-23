<?php

namespace App\Http\Controllers;

use Redirect,Response;
use App\sorteo;
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
        $sorteos = sorteo::orderBy('id','desc')->paginate(8);
        return view('sorteo.index',compact('sorteos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sorteo_id = $request->sorteo_id;
        $user   =   sorteo::updateOrCreate(['id' => $sorteo_id,
            'name'=>$request['name'],
            'lottery'=>$request['lottery'],
            'date'=>$request['date'],
            'time'=>$request['time'],
            'award'=>$request['award']]);
    
        return Response::json($sorteo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sorteo = sorteo::where('id',$id)->delete();
   
        return Response::json($sorteo);
    }
}
