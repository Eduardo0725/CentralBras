<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingAndSale extends Model
{
    public function waysToReceivePayment()
    {
        return $this->belongsTo(WaysToReceivePayment::class, 'idHowToReceivePayments', 'id');
    }

    public function card()
    {
        return $this->belongsTo(Card::class, 'idCard', 'id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'idBuyer', 'id');
    }

    public function salesman()
    {
        return $this->belongsTo(User::class, 'idSalesman', 'id');
    }
}
