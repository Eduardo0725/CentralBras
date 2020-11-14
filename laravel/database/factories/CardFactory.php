<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        'idUser' => App\Models\User::all(['id'])->random(),
        'cardNumber' => $faker->numerify('################'),
        'cardHouder' => $faker->creditCardDetails['name'],
        'dayOfValidity' => random_int(1, 12),
        'yearOfValidity' => 21,
        'cvv' => $faker->numerify('###'),
        'cardHolderCPF' => $faker->unique()->numerify('###########'),
        'cardHolderDateOfBirth' => $faker->dateTimeBetween('-100 years')
    ];
});
