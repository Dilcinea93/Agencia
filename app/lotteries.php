<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\EnumValues;
use App\Models\Traits\GetFillables;

class lotteries extends Model
{


    use EnumValues,GetFillables;
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $table = 'lotteries';

   protected $fillable  = ['id','name'];}
?>