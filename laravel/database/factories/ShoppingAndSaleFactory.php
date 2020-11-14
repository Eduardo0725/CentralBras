<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShoppingAndSale;
use Faker\Generator as Faker;

$factory->define(ShoppingAndSale::class, function (Faker $faker) {
    $paymentMethod = [
        'boleto',
        'eft',
        'creditCard'
    ];

    return [
        'idBuyer' => App\Models\User::all(['id'])->random(),
        'idSalesman' => App\Models\User::all(['id'])->random(),
        'idHowToReceivePayments' => App\Models\WaysToReceivePayment::all(['id'])->random(), //
        'idCard' => App\Models\Card::all(['id'])->random(), //
        'shoppingCart' => '{}',
        'paymentMethod' => $paymentMethod[random_int(0, 2)],
        'linkInvoice' => '', //
        'interest' => '', //
        'installments' => '', //
        'discount' => '', //
        'paid' => $faker->boolean,
        'paymentDate' => '', //
        'exitAddress' => '', //
        'addressOfReceive' => '', //
        'information' => '{}',
        'status' => 'pendente',
    ];
});
