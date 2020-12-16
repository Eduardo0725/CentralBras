<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'idUser',
        'cep',
        'state',
        'city',
        'street',
        'houseNumber',
        'complement',
        'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_addresses', 'idAddress', 'idProduct');
    }
}
