<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'course_id' => \App\Course::inRandomOrder()->value('id'),
        'user_id' => \App\User::inRandomOrder()->value('id'),
        'title' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'text' => $faker->unique()->text($maxNbChars = 100),
    ];
});
