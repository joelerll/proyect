<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->text($maxNbChars = 10),
        'content_course_id' => \App\ContentCourse::inRandomOrder()->value('id'),
        'order' => $faker->randomDigit,
        'duration' => '00:01:00'
    ];
});
