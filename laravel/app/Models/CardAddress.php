<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardAddress extends Model
{
    public function card()
    {
        return $this->belongsTo(Card::class, 'idCard', 'id');
    }
}
