<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use App\Models\ShoppingCartPayment;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(ShoppingCartPayment::class, function (Faker $faker) {
    $address = (Session::get('databaseFactory.addresses') ?? Address::all())->random();

    $users = Session::get('databaseFactory.users') ?? User::all();

    $buyer = $users->random();
    $salesman = $users->random();

    return [
        'idBuyer' => $buyer->id,
        'idSalesman' => $salesman->id,
        'idDeliveryAddress' => $address->id
    ];
});
