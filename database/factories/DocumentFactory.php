<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'content_id' => \App\Content::inRandomOrder()->value('id'),
        'url' => $faker->unique()->imageUrl($width = 640, $height = 480),
    ];
});
