<?php

use App\Models\Pagseguro;
use App\Models\User;
use App\Models\WaysToReceivePayment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class PagseguroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pagseguro::class, (Session::get('databaseFactory.waysToReceivePayments') ?? WaysToReceivePayment::all())->count())->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.pagseguro', Pagseguro::all());
    }
}
