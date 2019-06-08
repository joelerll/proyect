<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Billings;
use Faker\Generator as Faker;

$factory->define(Billings::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::inRandomOrder()->value('id'),
    ];
});
