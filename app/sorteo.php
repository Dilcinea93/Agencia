<?php

namespace App;

use App\client;
use DB;
use Illuminate\Database\Eloquent\Model;

class sorteo extends Model
{
	/**
     * Run the migrations.
     *
     * @return void
     */
    protected $table = 'sorteo';
	public $winner='';
   protected $fillable  = ['id','name','lottery','date','time','description','award'];


	public function winner($number){
		echo "llego aquí\t: ".$number;
		/**Acomoda esto haciendo una relacion en DB*/
		$winner= DB::table('client')->where('id_num',$number)->first();
		if($winner){
			echo "LLEGO AQUI: modelo sorteo(26)".$winner->name;
			$winner_id= $winner->id;
			$winner= DB::table('client')->where('id',$winner_id);
			$winner= $winner->name;
			$this->winner= $winner;
		}else{
			return false;
		}
	}  	
	public function getwinner(){
		return $this->winner;
	}
}
