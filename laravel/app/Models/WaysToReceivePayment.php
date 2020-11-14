<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaysToReceivePayment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function shoppingAndSale()
    {
        return $this->hasMany(ShoppingAndSale::class, 'idHowToReceivePayments', 'id');
    }
}
