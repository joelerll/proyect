<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'about' => $faker->unique()->text($maxNbChars = 200),
        'learn' => $faker->unique()->text($maxNbChars = 200),
        'image' => $faker->unique()->imageUrl($width = 640, $height = 480) ,
        'available' => true,
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 20, $max = 50),
    ];
});
