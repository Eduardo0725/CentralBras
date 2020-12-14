<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pagseguro;
use App\Models\WaysToReceivePayment;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

$factory->define(Pagseguro::class, function (Faker $faker) {
    if (!Session::exists('pagseguroFactory'))
        Session::put('pagseguroFactory', [
            'count' => Pagseguro::all()->count(),
            'max' => (Session::get('databaseFactory.waysToReceivePayments') ?? WaysToReceivePayment::all())
        ]);

    $count = Session::get('pagseguroFactory.count') + 1;
    $max = Session::get('pagseguroFactory.max');

    $waysToReceivePayment = $max->where('id', $count)->first();

    $user = $waysToReceivePayment->user()->get()->first();

    $max === $count ? Session::forget('pagseguroFactory') : Session::put('pagseguroFactory.count', $count);

    return [
        'idHowToGetPaid' => $waysToReceivePayment->id,
        'email' => $user->email,
        'token' => Hash::make('password')
    ];
});
