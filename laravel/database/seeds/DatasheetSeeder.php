<?php

use App\Models\Datasheet;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class DatasheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Datasheet::class, (Session::get('databaseFactory.products') ?? Product::all())->count() * 10);
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.datasheets', Datasheet::all());
    }
}
