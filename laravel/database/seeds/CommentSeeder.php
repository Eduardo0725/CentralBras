<?php

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comment::class, (Session::get('databaseFactory.products') ?? Product::all())->count())->create();
        if (Session::exists('databaseFactory'))
            Session::put('databaseFactory.comments', Comment::all());
    }
}
