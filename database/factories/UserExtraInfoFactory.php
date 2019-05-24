<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\UserExtraInfo;
use Faker\Generator as Faker;

$factory->define(UserExtraInfo::class, function (Faker $faker) {
    return [
        'country' => $faker->country,
        'document_type' => $faker->randomElement($array = array ('dni','passport')),
        'dni' => $faker->unique()->dni,
        'career' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'user_id' =>  \App\User::inRandomOrder()->value('id'),
    ];
});
