<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CourseUser;
use Faker\Generator as Faker;

$factory->define(CourseUser::class, function (Faker $faker) {
    return [
        'course_id' => $faker->numberBetween(1, App\Course::count()),
        'user_id' => $faker->numberBetween(1, App\User::count()),
        'score' => $faker->numberBetween($min = 0, $max = 5) ,
        'scoreText' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'active' => true
    ];
});
