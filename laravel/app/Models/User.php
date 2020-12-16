<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class, 'idUser', 'id');
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites', 'idUser', 'idProduct');
    }

    public function shoppingCart()
    {
        return $this->hasOne(ShoppingCart::class, 'idUser', 'id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'idUser', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'idUser', 'id');
    }

    public function cards()
    {
        return $this->hasMany(Card::class, 'idUser', 'id');
    }

    public function waysToReceivePayments()
    {
        return $this->hasMany(WaysToReceivePayment::class, 'idUser', 'id');
    }

    public function purchases()
    {
        return $this->hasMany(ShoppingCartPayment::class, 'idBuyer', 'id');
    }

    public function sales()
    {
        return $this->hasMany(ShoppingCartPayment::class, 'idSalesman', 'id');
    }
}
