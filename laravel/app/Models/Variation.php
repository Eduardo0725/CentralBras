<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    public $fillable = [
        'idProduct',
        'name'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct', 'id');
    }

    public function values() {
        return $this->hasMany(VariationValue::class, 'idVariation', 'id');
    }
}
