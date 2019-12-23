<?php

use Illuminate\Database\Seeder;
use App\sorteo;

class sorteoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        sorteo::create([
        	'name'=>'cena navideña',
        	'lottery'=>'táchira',
        	'date'=>'1-1-1',
        	'time'=>'1',
        	'award'=>'20 hallacas'
        ]);
    }
}
