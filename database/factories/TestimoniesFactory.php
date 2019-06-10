<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Testimonies;
use Faker\Generator as Faker;

$factory->define(Testimonies::class, function (Faker $faker) {
    return [
        'placeholder' => $faker->unique()->imageUrl($width = 640, $height = 480) ,
        'name' =>  $faker->unique()->name,
        'url' => $faker->unique()->imageUrl($width = 640, $height = 480),
        'description' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
