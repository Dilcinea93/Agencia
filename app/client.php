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

   protected $fillable  = ['id_client','cedula','name','email','phone','id_num'];
  	

   public function ventas(){
      return $this->hasMany(venta::class,'id_client');
      }
}


