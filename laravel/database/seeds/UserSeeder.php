<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 100)->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.users', User::all());
    }
}
