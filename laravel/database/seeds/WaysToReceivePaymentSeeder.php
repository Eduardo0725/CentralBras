<?php

use App\Models\WaysToReceivePayment;
use Illuminate\Database\Seeder;

class WaysToReceivePaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WaysToReceivePayment::class, 100)->create();
    }
}
