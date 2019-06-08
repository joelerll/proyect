<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'content_course_id' => \App\ContentCourse::inRandomOrder()->value('id'),
        'placeholder' => $faker->unique()->imageUrl($width = 640, $height = 480) ,
        'url' => $faker->unique()->imageUrl($width = 640, $height = 480) ,
        'order' => $faker->randomDigit,
        'duration' => '59:59'
    ];
});
