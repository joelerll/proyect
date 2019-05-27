<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Score;
use Faker\Generator as Faker;

$factory->define(Score::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::inRandomOrder()->value('id'),
        'course_id' => \App\Course::inRandomOrder()->value('id'),
        'score' => $faker->numberBetween($min = 0, $max = 5) ,
        'title' => $faker->numberBetween($min = 0, $max = 5) ,
        'comment' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
