<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumsTable extends Migration
{
     public function up()
    {
        Schema::create('numsModel', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->integer('number');
            $table->integer('id_client')->nullable();
            $table->integer('status')->nullable();
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('numsModel');
    }
}
