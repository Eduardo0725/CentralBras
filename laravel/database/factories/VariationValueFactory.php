<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Variation;
use App\Models\VariationValue;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(VariationValue::class, function (Faker $faker) {
    $variation = (Session::get('databaseFactory.variations') ?? Variation::all())->random();

    return [
        'idVariation' => $variation->id,
        'value' => 'Valor ' . random_int(1, 20)
    ];
});
