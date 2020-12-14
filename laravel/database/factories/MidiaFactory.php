<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Midia;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(Midia::class, function (Faker $faker) {
    $product = (Session::get('databaseFactory.products') ?? Product::all())->random();

    return [
        'idProduct' => $product->id,
        'type' => 'image',
        'path' => 'teste.jpg'
    ];
});
