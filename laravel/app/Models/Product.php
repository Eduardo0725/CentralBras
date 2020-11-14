<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'idCategory', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'idProduct', 'id');
    }

    public function shoppingCart()
    {
        return $this->hasMany(ShoppingCart::class, 'idProduct', 'id');
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class, 'idProduct', 'id');
    }
}
