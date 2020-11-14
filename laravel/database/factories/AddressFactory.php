<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'idUser' => App\Models\User::all(['id'])->random(),
        'cep' => $faker->numerify('########'),
        'state' => $faker->state,
        'city' => $faker->city,
        'street' => $faker->streetName,
        'houseNumber' => $faker->randomNumber(5),
        'phone' => $faker->phoneNumber
    ];
});
