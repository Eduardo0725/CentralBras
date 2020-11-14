<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CardAddress;
use Faker\Generator as Faker;

$factory->define(CardAddress::class, function (Faker $faker) {
    return [
        'idCard' => App\Models\Card::all(['id'])->random(),
        'cep' => $faker->numerify('########'),
        'state' => $faker->state,
        'city' => $faker->city,
        'street' => $faker->streetName,
        'houseNumber' => $faker->randomNumber(5),
    ];
});
