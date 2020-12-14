<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Midia extends Model
{
    public $fillable = [
        'idProduct',
        'type',
        'path'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct', 'id');
    }
}
