<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\UserType;
use Faker\Generator as Faker;

$factory->define(UserType::class, function (Faker $faker) {
    static $order = 0;
    $array = [
        'user',
        'tutor',
        'admin',
    ];
    return [
        'type' => $array[$order++],
    ];
});
