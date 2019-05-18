<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CourseUser;
use Faker\Generator as Faker;

$factory->define(CourseUser::class, function (Faker $faker) {
    return [
        'course_id' => \App\Course::inRandomOrder()->value('id'),
        'user_id' => \App\User::inRandomOrder()->value('id'),
        'score' => $faker->numberBetween($min = 0, $max = 5) ,
        'scoreText' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'active' => true
    ];
});
