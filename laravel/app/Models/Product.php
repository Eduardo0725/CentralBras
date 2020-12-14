<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = [
        'idUser',
        'idCategory',
        'name',
        'amount',
        'description',
        'productSituation',
        'universalCode',
        'brand',
        'model',
        'discount',
        'installments',
        'installmentsInterestFree',
        'cost',
        'warranty',
        'warrantyDay',
        'warrantyMonth',
        'warrantyYear'
    ];

    public function search($request = null)
    {
        $products = $this;
        $search = $request->search ?? null;
        $options = $request->options ?? null;
        $paginate = $request->paginate ?? null;

        if ($search)
            $products = $products->where('products.name', 'LIKE', "%$search%");

        if ($options)
            foreach ($options as $key => $option) {
                if ($option === 'sales') {
                    $products = $products->rightJoin('streams', 'streams.idProduct', '=', 'products.id')
                        ->groupBy(
                            'products.id',
                            'products.name',
                            'products.cost',
                            'products.discount',
                            'products.interest',
                        )
                        ->select(
                            DB::raw('count(products.id) as sales'),
                            'products.id',
                            'products.name',
                            'products.cost',
                            'products.discount',
                            'products.interest',
                        )
                        ->orderBy('sales', 'desc');
                }

                if ($key === 'take')
                    $products = $products->take($option);
            }

        $products = $paginate ? $products->paginate($paginate) : $products->get()->all();

        return $products;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'idCategory', 'id');
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'product_addresses', 'idProduct', 'idAddress');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'idProduct', 'id');
    }

    public function shoppingCart()
    {
        return $this->hasMany(ShoppingCart::class, 'idProduct', 'id');
    }

    public function favorite()
    {
        return $this->belongsToMany(User::class, 'favorites', 'idProduct', 'idUser');
    }

    public function variation()
    {
        return $this->hasMany(Variation::class, 'idProduct', 'id');
    }

    public function datasheet()
    {
        return $this->hasMany(Datasheet::class, 'idProduct', 'id');
    }

    public function midia()
    {
        return $this->hasMany(Midia::class, 'idProduct', 'id');
    }

    public function streams()
    {
        return $this->hasMany(Streams::class, 'idProduct', 'id');
    }
}
