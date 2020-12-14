<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Card;
use App\Models\DebitPayment;
use App\Models\Payment;
use App\Models\ShoppingCartPayment;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(DebitPayment::class, function (Faker $faker) {
    $count = (Session::get('databaseFactory.debits') ?? DebitPayment::all())->count();

    $payments = (Session::get('databaseFactory.payments') ?? Payment::all())->where('payment', 'debit')->all();

    $newPayments = [];

    foreach ($payments as $key => $value)
        array_push($newPayments, $value);

    $payment = $newPayments[$count];

    $shoppingCartPayment = (Session::get('databaseFactory.shoppingCartPayments') ?? ShoppingCartPayment::all())->find($payment->idShoppingCartPayment);

    $idBuyer = $shoppingCartPayment->idBuyer;

    $card = (Session::get('databaseFactory.cards') ?? Card::all())->where('idUser', $idBuyer)->all();

    $idCard = $card[$count] ?? null;

    return [
        'idPayment' => $payment->id,
        'idCard' => $idCard
    ];
});
