<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Payment;
use App\Models\ReceivedPayment;
use App\Models\ShoppingCartPayment;
use App\Models\WaysToReceivePayment;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(ReceivedPayment::class, function (Faker $faker) {
    $count = (Session::get('databaseFactory.receivedPayments') ?? ReceivedPayment::all())->count();

    $payments = Session::get('databaseFactory.payments') ?? Payment::all();

    $newPayments = [];

    foreach ($payments as $key => $value)
        array_push($newPayments, $value);

    $payment = $newPayments[$count];

    $shoppingCartPayment = (Session::get('databaseFactory.shoppingCartPayments') ?? ShoppingCartPayment::all())->find($payment->idShoppingCartPayment);

    $idSalesman = $shoppingCartPayment->idSalesman;

    $howToGetPaid = (Session::get('databaseFactory.waysToReceivePayments') ?? WaysToReceivePayment::all())->where('idUser', $idSalesman)->all();

    $idHowToGetPaid = $howToGetPaid[$count] ?? null;

    return [
        'idHowToGetPaid' => $idHowToGetPaid,
        'idPayment' => $payment->id
    ];
});
