<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\ShoppingCartPayment;
use App\Models\Streams;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Session;

$factory->define(Streams::class, function (Faker $faker) {
    $shoppingCartPayment = (Session::get('databaseFactory.shoppingCartPayments') ?? ShoppingCartPayment::all())->random();

    $product = (Session::get('databaseFactory.products') ?? Product::all())->where('idUser', $shoppingCartPayment->idSalesman)->random();

    return [
        'idProduct' => $product->id,
        'idShoppingCartPayment' => $shoppingCartPayment->id,
        'cost' => $product->cost,
        'amount' => $product->amount,
        'discount' => $product->discount,
        'installments' => $product->installments,
        'interest' => $product->interest,
    ];
});
