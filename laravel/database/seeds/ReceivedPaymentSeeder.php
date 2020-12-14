<?php

use App\Models\Payment;
use App\Models\ReceivedPayment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class ReceivedPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $receivedPayments = ReceivedPayment::all()->count();
        $payment = (Session::get('databaseFactory.payments') ?? Payment::all())->count();
        $total = $payment - $receivedPayments;

        if ($total) factory(ReceivedPayment::class, $total)->create();

        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.receivedPayments', ReceivedPayment::all());
    }
}
