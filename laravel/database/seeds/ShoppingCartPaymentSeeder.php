<?php

use App\Models\ShoppingCartPayment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class ShoppingCartPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShoppingCartPayment::class, (Session::get('databaseFactory.users') ?? User::all())->count() * 2)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.shoppingCartPayments', ShoppingCartPayment::all());
    }
}
