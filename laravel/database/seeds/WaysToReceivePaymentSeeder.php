<?php

use App\Models\User;
use App\Models\WaysToReceivePayment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class WaysToReceivePaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WaysToReceivePayment::class, (Session::get('databaseFactory.users') ?? User::all())->count())->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.waysToReceivePayments', WaysToReceivePayment::all());
    }
}
