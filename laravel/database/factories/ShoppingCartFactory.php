<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(ShoppingCart::class, function (Faker $faker) {
    $user = (Session::get('databaseFactory.users') ?? User::all())->random();

    $product = (Session::get('databaseFactory.products') ?? Product::all())->random();

    return [
        'idUser' => $user->id,
        'idProduct' => $product->id
    ];
});
