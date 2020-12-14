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

    public function paymentDebit()
    {
        return $this->belongsToMany(Card::class, 'debit_payments', 'idCard', 'idPayment');
    }

    public function paymentCredit()
    {
        return $this->belongsToMany(Card::class, 'credit_payments', 'idCard', 'idPayment');
    }
}
