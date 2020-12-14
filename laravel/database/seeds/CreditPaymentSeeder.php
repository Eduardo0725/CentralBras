<?php

use App\Models\CreditPayment;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class CreditPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credit = CreditPayment::all()->count();
        $payment = (Session::get('databaseFactory.users') ?? Payment::all())->where('payment', 'credit')->count();
        $total = $payment - $credit;

        if ($total) factory(CreditPayment::class, $total)->create();

        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.credits', CreditPayment::all());
    }
}
