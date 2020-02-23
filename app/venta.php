<?php

namespace App;
use App\client;
use App\numsModel;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    protected $table = 'venta';

   protected $fillable  = ['id','id_client','id_user','id_num','fecha','amount','status'];
  	public function client(){
  		 //dd($this->belongsTo(client::class));
  		return $this->belongsTo(client::class,'id');
      }

  public function numeros(){
   //dd($this->belongsTo(client::class));
  return $this->hasMany(numsModel::class,'id');
  }
}
