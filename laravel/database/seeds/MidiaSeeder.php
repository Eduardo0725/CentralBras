<?php

use App\Models\Midia;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class MidiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Midia::class, (Session::get('databaseFactory.products') ?? Product::all())->count() * 3)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.midia', Midia::all());
    }
}
