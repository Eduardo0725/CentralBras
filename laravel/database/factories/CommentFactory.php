<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'idUser' => App\Models\User::all(['id'])->random(),
        'idProduct' => App\Models\Product::all(['id'])->random(),
        'stars' => random_int(0, 5),
        'title' => $faker->title(),
        'description' => $faker->sentence()
    ];
});
