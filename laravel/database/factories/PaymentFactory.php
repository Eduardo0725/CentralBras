<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Payment;
use App\Models\ShoppingCartPayment;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(Payment::class, function (Faker $faker) {
    $payments = [
        'billet',
        'debit',
        'credit'
    ];

    $paid = $faker->boolean();

    $payday = $paid ? $faker->dateTime('now') : null;

    $payment = (Session::get('databaseFactory.payments') ?? Payment::all())->count();

    $shoppingCartPayment = (Session::get('databaseFactory.shoppingCartPayments') ?? ShoppingCartPayment::all())->find($payment + 1);

    return [
        'idShoppingCartPayment' => $shoppingCartPayment->id,
        'paid' => $paid,
        'payday' => $payday,
        'payment' => $payments[array_rand($payments)],
    ];
});
