<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CourseUser;
use Faker\Generator as Faker;

$factory->define(CourseUser::class, function (Faker $faker) {
    return [
        'course_id' => \App\Course::inRandomOrder()->value('id'),
        'user_id' => \App\User::inRandomOrder()->value('id'),
        'created_at' => $faker->dateTimeBetween($startDate = '-2 month', $endDate = 'now', $timezone = null),
        'updated_at' => $faker->dateTimeBetween($startDate = '-2 month', $endDate = 'now', $timezone = null)
    ];
});
