<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sorteo extends Model
{
	/**
     * Run the migrations.
     *
     * @return void
     */
    protected $table = 'sorteo';

   protected $fillable  = ['id','name','lottery','date','time','award'];
  	
  	}
