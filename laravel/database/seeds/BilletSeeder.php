<?php

use App\Models\Billet;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class BilletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Billet::class, (Session::get('databaseFactory.payments') ?? Payment::all())->where('payment', 'billet')->count())->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.billets', Billet::all());
    }
}
