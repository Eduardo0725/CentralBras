<?php

use App\Models\Favorite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Favorite::class, 100)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.favorites', Favorite::all());
    }
}
