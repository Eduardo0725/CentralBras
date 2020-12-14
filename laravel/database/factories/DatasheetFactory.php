<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Datasheet;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(Datasheet::class, function (Faker $faker) {
    $product = (Session::get('databaseFactory.products') ?? Product::all())->random();

    return [
        'idProduct' => $product->id,
        'name' => 'Nome',
        'description' => $faker->sentence()
    ];
});
