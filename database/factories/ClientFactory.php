<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\client;
use Faker\Generator as Faker;

$factory->define(client::class, function (Faker $faker) {
    return ['name'=>$faker->name,
        	'cedula'=>$faker->randomDigit,
        	'id_num'=>$faker->randomDigit,
        	'email'=>$faker->email,
        	'phone'=>$faker->tollFreePhoneNumber];
});
