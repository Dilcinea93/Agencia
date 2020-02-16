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
        
        for($i=1;$i<100;$i++){
            \DB::table('numsModel')->insert([
                'number' => $i,
                'id_client'=> ''
            ]);
        }
    }
}
