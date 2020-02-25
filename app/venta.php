<?php

namespace App;
use App\client;
use App\event;
use App\numsModel;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    protected $table = 'venta';

   protected $fillable  = ['id','id_client','id_user','id_num','id_event','fecha','status'];
  	public function client(){
  		return $this->belongsTo(client::class,'id');
      }

  public function numeros(){
  return $this->hasMany(numsModel::class,'id');
  }

  public function event(){
  return $this->belongsTo(event::class,'id_event');

  /*
  LA tabla VENTA tiene un id_event y un id. Esto
  return $this->belongsTo(event::class,'id');

  Me traia el objeto equivocado porque

  yo estaba comparando el ID (id) de la tabla VENTA (en el registro correcto... el 2, en ese momento), con el ID (id) de la tabla EVENT, como lo dice en la migracion.
MIRALA:   $table->foreign('ID_EVENT')->references('id')->on('event')->onDelete('cascade');


  VE, el segundo parametro del belongsTO tiene que ser igual que la clave foranea de la tabla, en este caso es ID_EVENT. De esa forma. el compara el ID_EVENT de la tabla, con el ID de la otra tabla, como lo dice en la migracion.... 
  */
  }
}
