<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSorteoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorteo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lottery');
            $table->string('description');
            $table->date('date');
            $table->string('time');
            $table->string('award');
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
        Schema::dropIfExists('sorteo');
    }
}
