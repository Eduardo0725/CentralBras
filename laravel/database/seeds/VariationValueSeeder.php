<?php

use App\Models\Variation;
use App\Models\VariationValue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class VariationValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VariationValue::class, (Session::get('databaseFactory.variations') ?? Variation::all())->count() * 2)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.variationValues', VariationValue::all());
    }
}
