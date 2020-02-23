<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->string('name');
            $table->string('lottery');
            $table->string('description');
            $table->date('date');
            $table->string('time');
            $table->string('award');
            $table->timestamps();

            // Como hacer que en el campo id_user se inserte el ID del usuario Administrador?
            //$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
