<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Salary;
use Faker\Generator as Faker;

$factory->define(Salary::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['500 - 1000 USD', '2000 - 2500 USD', '2600 - 3000', 'No mostrar salario'])
    ];
});
