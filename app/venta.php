<?php

namespace App;
use App\client;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    protected $table = 'venta';

   protected $fillable  = ['id_venta','id_client','id_user','id_num','fecha','amount','status'];
  	public function client(){
  		 //dd($this->belongsTo(client::class));
  		return $this->belongsTo(client::class,'id_client');
      }
}
