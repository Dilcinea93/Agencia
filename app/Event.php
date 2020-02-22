<?php

namespace App;

use App\client;
use DB;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	/**
     * Run the migrations.
     *
     * @return void
     */
	public function __construct(){

	}
    protected $table = 'event';
	public $winner='';
   protected $fillable  = ['id','name','lottery','date','time','description','award'];


	public function winner($number){
		/**Acomoda esto haciendo una relacion en DB*/
		$winner= DB::table('client')->where('id_num',$number)->first();
		if($winner){
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
