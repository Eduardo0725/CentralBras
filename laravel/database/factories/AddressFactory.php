<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(Address::class, function (Faker $faker) {
    $users = (Session::get('databaseFactory.users') ?? User::all())->random();

    return [
        'idUser' => $users->id,
        'cep' => $faker->numerify('########'),
        'state' => $faker->state,
        'city' => $faker->city,
        'street' => $faker->streetName,
        'houseNumber' => $faker->randomNumber(5),
        'phone' => $faker->numerify('0###########')
    ];
});
