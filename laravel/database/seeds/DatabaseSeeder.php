<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(WaysToReceivePaymentSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(CardSeeder::class);
        $this->call(CardAddressSeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(ShoppingCartSeeder::class);
        $this->call(ShoppingAndSaleSeeder::class);
    }
}
