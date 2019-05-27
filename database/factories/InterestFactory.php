<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Interest;
use Faker\Generator as Faker;

$factory->define(Interest::class, function (Faker $faker) {
    static $order = 0;
    $array = [
        'Respostería',
        'Arte',
        'Nutrición',
        'Estética',
        'Fitness',
        'Costura'
    ];
    return [
        'name' => $array[$order++],
    ];
});
