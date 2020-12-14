<?php

use App\Models\ShoppingCartPayment;
use App\Models\Streams;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class StreamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Streams::class, (Session::get('databaseFactory.shoppingCartPayments') ?? ShoppingCartPayment::all())->count() * 5)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.streams', Streams::all());
    }
}
