<?php

use App\Models\CardAddress;
use Illuminate\Database\Seeder;

class CardAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CardAddress::class, 100)->create();
    }
}
