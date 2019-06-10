<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\WhyUse;
use Faker\Generator as Faker;

$factory->define(WhyUse::class, function (Faker $faker) {
    return [
        'placeholder' => $faker->unique()->imageUrl($width = 640, $height = 480) ,
        'name' =>  $faker->unique()->name,
        'title' =>  $faker->unique()->sentence($nbWords = 20, $variableNbWords = true),
        'description' => $faker->unique()->sentence($nbWords = 50, $variableNbWords = true),
    ];
});
