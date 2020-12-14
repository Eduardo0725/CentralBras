<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Card;
use App\Models\CardAddress;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(CardAddress::class, function (Faker $faker) {
    $card = (Session::get('databaseFactory.cards') ?? Card::all())->find(CardAddress::all()->count() + 1);

    return [
        'idCard' => $card->id,
        'cep' => $faker->numerify('########'),
        'state' => $faker->state,
        'city' => $faker->city,
        'street' => $faker->streetName,
        'houseNumber' => $faker->randomNumber(5),
    ];
});
