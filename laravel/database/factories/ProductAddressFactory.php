<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use App\Models\Product;
use App\Models\ProductAddress;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(ProductAddress::class, function (Faker $faker) {
    $product = (Session::get('databaseFactory.products') ?? Product::all())->random();

    $address = (Session::get('databaseFactory.addresses') ?? Address::all())->random();

    return [
        'idProduct' => $product->id,
        'idAddress' => $address->id
    ];
});
