<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Experience;
use Faker\Generator as Faker;

$factory->define(Experience::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['0 - 6 meses', '1 año', '3 años', '6 meses', '5 años', 'Sin experiencia'])
    ];
});
