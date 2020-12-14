<?php

use App\Models\Card;
use App\Models\CardAddress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class CardAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CardAddress::class, (Session::get('databaseFactory.cards') ?? Card::all())->count())->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.cardAddresses', CardAddress::all());
    }
}
