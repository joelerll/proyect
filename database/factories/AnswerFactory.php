<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::inRandomOrder()->value('id'),
        'question_id' => \App\Question::inRandomOrder()->value('id'),
        'text' => $faker->unique()->text($maxNbChars = 100),
    ];
});
