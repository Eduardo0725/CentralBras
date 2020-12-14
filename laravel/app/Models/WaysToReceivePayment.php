<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaysToReceivePayment extends Model
{
    public $fillable = [
        'idUser',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function pagseguro()
    {
        return $this->hasOne(Pagseguro::class, 'idHowToGetPaid', 'id');
    }

    public function receivedPayments()
    {
        return $this->hasMany(ReceivedPayment::class, 'idHowToGetPaid', 'id');
    }
}
