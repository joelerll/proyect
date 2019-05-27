<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CourseInterest;
use Faker\Generator as Faker;

$factory->define(CourseInterest::class, function (Faker $faker) {
    return [
        'course_id' => \App\Course::inRandomOrder()->value('id'),
        'interest_id' => \App\Interest::inRandomOrder()->value('id'),
    ];
});
