<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\numsModel;
use Faker\Generator as Faker;

$factory->define(\App\numsModel::class, function (Faker $faker) {
    return [
    	'number'=>$faker->number,
    	'id_client'=>$faker->number,
    	'status'=>$faker->number(0,1)
    ];
});
/**
Cuando corri: factory('numsModel')->create();
me salio esto:
	InvalidArgumentException with message 'Unable to locate factory with name [default] [numsModel..

	no eran los nombres de namespaces.
	Tampoco era que no estaba importando el modelo.
	Agregue esta ruta \App\numsModel en la funcion define y tampoco era eso.


].'
*/