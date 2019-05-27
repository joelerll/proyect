<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\InterestUser;
use Faker\Generator as Faker;

$factory->define(InterestUser::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::inRandomOrder()->value('id'),
        'interest_id' => \App\Interest::inRandomOrder()->value('id'),
    ];
});
