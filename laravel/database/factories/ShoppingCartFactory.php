<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShoppingCart;
use Faker\Generator as Faker;

$factory->define(ShoppingCart::class, function (Faker $faker) {
    return [
        'idUser' => App\Models\User::all(['id'])->random(),
        // 'products' => '{idProduct:1}',
        'idProduct' => App\Models\Product::all(['id'])->random()
    ];
});
