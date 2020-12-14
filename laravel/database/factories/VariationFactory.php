<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Variation;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(Variation::class, function (Faker $faker) {
    $product = (Session::get('databaseFactory.products') ?? Product::all())->random();

    return [
        'idProduct' => $product->id,
        'name' => 'Categoria'
    ];
});
