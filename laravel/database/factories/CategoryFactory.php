<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(Category::class, function (Faker $faker) {
    $categories = [
        'Veículo',
        'Tecnologia',
        'Casa e Eletrodomésticos',
        'Esporte e Lazer',
        'Jóias e Relógios',
        'Brinquedos e Bebês',
        'Ferramentas e Indústria',
        'Moda',
        'Beleza e Cuidado Pessoal',
        'Imóveis',
        'Supermercado'
    ];

    $count = (Session::get('databaseFactory.categories') ?? Category::all())->count();

    $category = $categories[$count];

    return [
        'name' => $category
    ];
});
