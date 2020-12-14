<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Streams extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct', 'id');
    }

    public function shoppingCartPayment()
    {
        return $this->belongsTo(ShoppingCartPayment::class, 'idShoppingCartPayment', 'id');
    }
}
