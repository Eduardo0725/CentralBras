<?php

use App\Models\Product;
use App\Models\ProductAddress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class ProductAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductAddress::class, (Session::get('databaseFactory.products') ?? Product::all())->count() * 2)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.productAddresses', ProductAddress::all());
    }
}
