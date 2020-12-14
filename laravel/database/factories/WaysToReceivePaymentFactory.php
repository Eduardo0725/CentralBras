<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\WaysToReceivePayment;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(WaysToReceivePayment::class, function (Faker $faker) {
    if(!Session::exists('waysToReceivePayment'))
        Session::put('waysToReceivePayment', [
            'count' => WaysToReceivePayment::all()->count(),
            'objective' => (Session::get('databaseFactory.users') ?? User::all())->count()
        ]);

    $waysToReceivePayment = Session::get('waysToReceivePayment');
    $count = $waysToReceivePayment['count'] + 1;
    $objective = $waysToReceivePayment['objective'];

    $count == $objective ? Session::forget('waysToReceivePayment') : Session::put('waysToReceivePayment.count', $count);

    return [
        'idUser' => $count,
        'type' => 'pagseguro'
    ];
});
