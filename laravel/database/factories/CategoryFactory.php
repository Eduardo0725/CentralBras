<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $category = [
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

    return [
        'name' => $category[App\Models\Category::all(['id'])->count()]
    ];
});
