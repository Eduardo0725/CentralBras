<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function shoppingCartPayment()
    {
        return $this->belongsTo(ShoppingCartPayment::class, 'idShoppingCartPayment', 'id');
    }

    public function billet()
    {
        return $this->hasOne(Payment::class, 'idPayment', 'id');
    }

    public function debit()
    {
        return $this->belongsToMany(Card::class, 'debit_payments', 'idPayment', 'idCard');
    }

    public function credit()
    {
        return $this->belongsToMany(Card::class, 'credit_payments', 'idPayment', 'idCard');
    }
}
