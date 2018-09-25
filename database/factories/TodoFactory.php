<?php

use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'completed' => $faker->boolean($chanceOfGettingTrue = 10)       
    ];
});
