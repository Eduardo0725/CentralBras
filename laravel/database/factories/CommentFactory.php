<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(Comment::class, function (Faker $faker) {
    $user = (Session::get('databaseFactory.users') ?? User::all())->random();

    $product = (Session::get('databaseFactory.products') ?? Product::all())->random();

    return [
        'idUser' => $user,
        'idProduct' => $product->id,
        'stars' => random_int(0, 5),
        'title' => $faker->title(),
        'description' => $faker->sentence()
    ];
});
