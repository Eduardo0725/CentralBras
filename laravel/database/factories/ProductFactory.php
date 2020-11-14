<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'idUser' => App\Models\User::all(['id'])->random(),
        'idCategory' => App\Models\Category::all(['id'])->random(),
        'name' => "Nome do Produto #{$faker->numerify('####################')}",
        'amount' => 100,
        'description' => $faker->sentence(),
        'datasheet' => '{}',
        'variations' => '{}',
        'linkMedia' => '',
        'productSituation' => $faker->boolean,
        'universalCode' => $faker->numerify('#############'),
        'brand' => '',
        'model' => '',
        'cost' => $faker->randomFloat(2, 2.99, 10000.00),
        'idWaysToReceivePayments' => 1,
        'addresses' => '{}',
        'warranty' => '{}',
    ];
});
