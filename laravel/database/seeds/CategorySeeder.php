<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countOfCategories = 11;

        $countDatabase = Category::all()->count();

        if($countDatabase < $countOfCategories)
            factory(Category::class, $countOfCategories - $countDatabase)->create();

        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.categories', Category::all());
    }
}
