<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\WaysToReceivePayment;
use Faker\Generator as Faker;

$factory->define(WaysToReceivePayment::class, function (Faker $faker) {
    return [
        'idUser' => App\Models\User::all(['id'])->random(),
        'howToReceivePayments' => '{}'
    ];
});
