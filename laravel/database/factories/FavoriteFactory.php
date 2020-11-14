<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Favorite;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker) {
    return [
        'idUser' => App\Models\User::all(['id'])->random(),
        // 'products' => '{idProduct:1}',
        'idProduct' => App\Models\Product::all(['id'])->random()
    ];
});
