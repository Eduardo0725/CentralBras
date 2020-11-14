<?php

use App\Models\ShoppingAndSale;
use Illuminate\Database\Seeder;

class ShoppingAndSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShoppingAndSale::class, 100)->create();
    }
}
