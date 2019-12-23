<?php

namespace App;

use App\client;
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

   protected $fillable  = ['id_num','number','id_client','status'];
  	public function client(){
  		 //dd($this->belongsTo(client::class));
  		return $this->belongsTo(client::class,'id_client');
      }
}
