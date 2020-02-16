<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\sorteo;
use Faker\Generator as Faker;

$factory->define(sorteo::class, function (Faker $faker) {
    return [
        //
        'name'=> $faker->name,
        'lottery'=> $faker->sentence,
        'description'=> $faker->sentence,
        'date'=> $faker->date,
        'time'=> $faker->time,
        'award'=> $faker->text
    ];
});

