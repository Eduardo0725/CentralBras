<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $user = (Session::get('databaseFactory.users') ?? User::all())->random();

    $category = (Session::get('databaseFactory.categories') ?? Category::all())->random();

    $string1 = Str::random(10);
    $string2 = Str::random(10);
    $string3 = Str::random(10);
    $string4 = Str::random(10);

    return [
        'idUser' => $user->id,
        'idCategory' => $category->id,
        'name' => "Nome do Produto {$string1} {$string2} {$string3} {$string4}",
        'amount' => random_int(1, 100),
        'description' => $faker->sentence(),
        'productSituation' => $faker->boolean,
        'universalCode' => $faker->numerify('#############'),
        'brand' => 'Sem Marca',
        'model' => 'Sem Modelo',
        'cost' => (float) number_format($faker->randomFloat(2, 2.99, 10000.00), 2, '.', ''),
        'warranty' => 'without',
        // 'warrantyDay',
        // 'warrantyMonth',
        // 'warrantyYear',
    ];
});
