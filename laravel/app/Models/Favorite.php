<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $fillable = [
        'idUser',
        'idProduct'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'idUser', 'id');
    // }

    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'idProduct', 'id');
    // }
}
