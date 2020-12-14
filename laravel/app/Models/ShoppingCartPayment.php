<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartPayment extends Model
{
    public function buyer()
    {
        return $this->belongsTo(User::class, 'idBuyer', 'id');
    }

    public function salesman()
    {
        return $this->belongsTo(User::class, 'idSalesman', 'id');
    }

    public function streams()
    {
        return $this->hasMany(Streams::class, 'idShoppingCartPayment', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'idShoppingCartPayment', 'id');
    }
}
