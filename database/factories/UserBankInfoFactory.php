<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\UserBankInfo;
use Faker\Generator as Faker;

$factory->define(UserBankInfo::class, function (Faker $faker) {
    return [
        'account_number' => $faker->unique()->bankAccountNumber,
        'name' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'email' => $faker->unique()->safeEmail,
        'document_type' => $faker->randomElement($array = array ('dni','passport')),
        'dni' => $faker->unique()->dni,
        'bank_name' => $faker->unique()->sentence($nbWords = 2, $variableNbWords = true),
        'user_bank_info_id' => \App\UserExtraInfo::inRandomOrder()->value('id'),
    ];
});
