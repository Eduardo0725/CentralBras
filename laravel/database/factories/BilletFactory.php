<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Billet;
use App\Models\Payment;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(Billet::class, function (Faker $faker) {
    $count = (Session::get('databaseFactory.billets') ?? Billet::all())->count();

    $payments = (Session::get('databaseFactory.payments') ?? Payment::all())->where('payment', 'billet')->all();

    $newPayments = [];

    foreach ($payments as $value)
        array_push($newPayments, $value);

    $payment = $newPayments[$count];

    return [
        'idPayment' => $payment->id,
        'link' => 'https://lh3.googleusercontent.com/proxy/oUNGQCTRuWnmJJ8bwgXv11lZXbNQ68EM_p7XH226XsF-aLo2ts0U_URSWEKsUKtYoSIkZyRhNf9ooHDoeUVQaWDU1a90hZy0dIAoeC7LlhwUOzCxMp88mQqR6KFpmlcKmk69Q7L3bRNSqMj7Lsd5EaIbpn9aheLub9RIiQhsPRz7s-ud'
    ];
});
