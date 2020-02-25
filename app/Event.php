<?php

namespace App;

use App\venta;
use App\user;
use DB;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	/**
     * Run the migrations.
     *
     * @return void
     */
    protected $table = 'event';
	public $winner='';
   public $fillable  = ['id','id_user','name','lottery','amount','date','time','description','award'];


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
	public function responsible(){
  		 //dd($this->belongsTo(client::class));
  		return $this->belongsTo(user::class,'id');
      }

    public function venta(){
       //dd($this->belongsTo(client::class));
      return $this->belongsToMany(venta::class,'id');
    }
}
