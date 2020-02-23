<?php

namespace App;
use App\venta;
use App\lotteries;
use Illuminate\Database\Eloquent\Model;

class numsModel extends Model
{
    //
    /**
     * Run the migrations.
     *
     * @return void
     */
   protected $table = 'numsModel';

   protected $fillable  = ['id','number','id_client','status'];
  	

      public function venta(){
       //dd($this->belongsTo(client::class));
      return $this->belongsTo(venta::class,'id');
      }
      public function lottery(){
       //dd($this->belongsTo(client::class));
      return $this->belongsTo(lotteries::class,'id');
      }
}
