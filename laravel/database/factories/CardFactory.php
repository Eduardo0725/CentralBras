<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Card;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(Card::class, function (Faker $faker) {
    $user = (Session::get('databaseFactory.users') ?? User::all())->random();

    return [
        'idUser' => $user->id,
        'cardNumber' => $faker->numerify('################'),
        'cardHouder' => $faker->creditCardDetails['name'],
        'dayOfValidity' => random_int(1, 12),
        'yearOfValidity' => 21,
        'cvv' => $faker->numerify('###'),
        'cardHolderCPF' => $faker->unique()->numerify('###########'),
        'cardHolderDateOfBirth' => $faker->dateTimeBetween('-100 years')
    ];
});
