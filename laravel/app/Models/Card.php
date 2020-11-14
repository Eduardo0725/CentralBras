<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function cardAddress()
    {
        return $this->hasOne(CardAddress::class, 'idCard', 'id');
    }

    public function shoppingCart()
    {
        return $this->hasMany(ShoppingCart::class, 'idCard', 'id');
    }
}
