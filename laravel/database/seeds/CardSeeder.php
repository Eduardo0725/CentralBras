<?php

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Card::class, (Session::get('databaseFactory.users') ?? User::all())->count() * 3)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.cards', card::all());
    }
}
