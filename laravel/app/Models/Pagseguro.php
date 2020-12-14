<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagseguro extends Model
{
    public function waysToReceivePayment()
    {
        return $this->belongsTo(WaysToReceivePayment::class, 'idHowToGetPaid', 'id');
    }
}
