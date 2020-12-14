<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datasheet extends Model
{
    public $fillable = [
        'idProduct',
        'name',
        'description'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct', 'id');
    }
}
