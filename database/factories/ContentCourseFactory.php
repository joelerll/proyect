<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ContentCourse;
use Faker\Generator as Faker;

$factory->define(ContentCourse::class, function (Faker $faker) {
    return [
        'course_id' => \App\Course::inRandomOrder()->value('id'),
        'name' => $faker->unique()->text($maxNbChars = 20),
        'description' => $faker->unique()->text($maxNbChars = 200),
        'order' => $faker->randomDigit,
    ];
});
