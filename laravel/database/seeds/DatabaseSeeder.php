<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Session::put('databaseFactory', []);

        $this->call([
            UsersSeeder::class,
            AddressSeeder::class,
            WaysToReceivePaymentSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            CommentSeeder::class,
            CardSeeder::class,
            CardAddressSeeder::class,
            FavoriteSeeder::class,
            ShoppingCartSeeder::class,
            PagseguroSeeder::class,
            VariationSeeder::class,
            VariationValueSeeder::class,
            DatasheetSeeder::class,
            MidiaSeeder::class,
            ProductAddressSeeder::class,
            ShoppingCartPaymentSeeder::class,
            StreamsSeeder::class,
            PaymentSeeder::class,
            BilletSeeder::class,
            DebitPaymentSeeder::class,
            CreditPaymentSeeder::class,
            ReceivedPaymentSeeder::class,
        ]);

        Session::forget('databaseFactory');
    }
}
