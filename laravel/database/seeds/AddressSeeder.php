<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Address::class, (Session::get('databaseFactory.users') ?? User::all())->count() * 3)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.addresses', Address::all());
    }
}
