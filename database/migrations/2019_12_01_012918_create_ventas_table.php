<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    //
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_num');
            $table->unsignedBigInteger('id_event');
            $table->date('fecha');
            $table->integer('amount');
            $table->integer('status')->nullable();
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('id_client')->references('id')->on('client')->onDelete('cascade');
            
            $table->foreign('id_num')->references('id')->on('numsModel')->onDelete('cascade');
            $table->foreign('id_event')->references('id')->on('event')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
