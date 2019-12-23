<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\venta;

class client extends Model
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $table = 'client';

   protected $fillable  = ['id_client','cedula','name','email','phone'];
  	
  	// public function venta(){
   //     //dd($this->belongsTo(client::class));
   //    dd($this->hasMany(client::class,'id_venta')->toSql());
   //    }
   //    // esta es la consulta que devuelve lo de arriba:   "select * from `client` where `client`.`id` is null"..... Porque??
}
// client::where('id_client',$venta->id_client)->first(); retorna  el cliente al que le pertenece la prumera venta

