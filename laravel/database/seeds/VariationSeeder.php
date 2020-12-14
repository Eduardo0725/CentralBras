<?php

use App\Models\Variation;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Variation::class, (Session::get('databaseFactory.products') ?? Product::all())->count())->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.variations', Variation::all());
    }
}
