<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    public function billet()
    {
        return $this->belongsTo(Payment::class, 'idPayment', 'id');
    }
}
