<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CourseUser;
use Faker\Generator as Faker;

$factory->define(CourseUser::class, function (Faker $faker) {
    return [
        'courses_id' => $faker->numberBetween(1, App\Course::count()),
        'users_id' => $faker->numberBetween(1, App\User::count()),
        'score' => $faker->randomNumber(5),
        'scoreText' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'active' => true
    ];
});
