<?php

use App\Models\Payment;
use App\Models\ShoppingCartPayment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Payment::class, (Session::get('databaseFactory.shoppingCartPayments') ?? ShoppingCartPayment::all())->count())->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.payments', Payment::all());
    }
}
