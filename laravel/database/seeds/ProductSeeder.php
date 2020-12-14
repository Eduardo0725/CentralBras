<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 1000)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.products', Product::all());
    }
}
