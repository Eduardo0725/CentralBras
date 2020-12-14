<?php

use App\Models\ShoppingCart;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class ShoppingCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShoppingCart::class, 100)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.shoppingCarts', ShoppingCart::all());
    }
}
