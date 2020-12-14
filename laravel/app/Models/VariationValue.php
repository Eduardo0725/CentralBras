<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariationValue extends Model
{
    public $fillable = [
        'idVariation',
        'value'
    ];

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'idVariation', 'id');
    }
}
