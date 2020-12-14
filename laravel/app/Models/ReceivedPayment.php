<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivedPayment extends Model
{
    public function waysToReceivePayment()
    {
        return $this->belongsTo(WaysToReceivePayment::class, 'idHowToGetPaid', 'id');
    }
}
