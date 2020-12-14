<?php

use App\Models\DebitPayment;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class DebitPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $debit = DebitPayment::all()->count();
        $payment = (Session::get('databaseFactory.payments') ?? Payment::all())->where('payment', 'debit')->count();
        $total = $payment - $debit;

        if ($total) factory(DebitPayment::class, $total)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.debits', DebitPayment::all());
    }
}
