<?php

use App\numsModel;
use Illuminate\Database\Seeder;

class numsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        for($i=0;$i<99;$i++){
            \DB::table('numsModel')->insert([
                'number' => $i,
                'id_client'=> ''
            ]);
        }
    }
}
