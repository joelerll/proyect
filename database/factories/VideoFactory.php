<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'content_id' => \App\Content::inRandomOrder()->value('id'),
        'placeholder' => $faker->unique()->imageUrl($width = 640, $height = 480) ,
        'url' => $faker->unique()->imageUrl($width = 640, $height = 480)
    ];
});
