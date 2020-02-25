<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        //

        'id_user'=> 1,
        'name'=> $faker->name,
        'lottery'=> $faker->sentence,
        'amount'=> 5000,
        'description'=> $faker->sentence,
        'date'=> $faker->date,
        'time'=> $faker->time,
        'award'=> $faker->text
    ];
});

