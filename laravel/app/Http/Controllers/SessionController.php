<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variation;
use App\Models\VariationValue;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public static function getShoppingCart()
    {
        //
    }

    public static function getAllShoppingCart()
    {
        $shoppingCart =  Session::get('shoppingCart', []);

        if (!$shoppingCart) return [];

        $products = [];

        foreach ($shoppingCart as $productId => $productArray) {

            foreach ($productArray as $shoppingCartArray) {

                foreach ($shoppingCartArray as $shoppingCartId => $variationsArray) {
                    $product = Product::find($productId);

                    $values = array_values($variationsArray);

                    $variations = $product->variation()
                        ->join('variation_values', 'variation_values.idVariation', '=', 'variations.id')
                        ->whereIn('variation_values.id', $values)
                        ->select(
                            'variations.id as idVariation',
                            'variations.name',
                            'variation_values.value',
                            'variation_values.id as idValue',
                        )
                        ->get()->all();

                    $product->variations = $variations;
                    $product->idShoppingCart = $shoppingCartId;
                    $product->midia = $product->midia()->select('id', 'path', 'type')->get()->all();

                    array_push($products, $product);
                }
            }
        }

        return $products;
    }

    public static function setShoppingCart($idProduct, $selected)
    {
        $shoppingCart = Session::get('shoppingCart', []);

        foreach ($selected as $key => $value)
            $shoppingCart["$idProduct"]['selected']["$key"] = $value;

        Session::put('shoppingCart', $shoppingCart);

        return true;
    }

    public static function deleteShoppingCart($idProduct, $idShoppingCart)
    {
        $shoppingCart = Session::get('shoppingCart', false);

        if (!$shoppingCart) return false;

        unset($shoppingCart["$idProduct"]['selected']["$idShoppingCart"]);

        Session::put('shoppingCart', $shoppingCart);

        return !isset($shoppingCart["$idProduct"]['selected']["$idShoppingCart"]);
    }

    public static function deleteAllShoppingCart()
    {
        Session::forget("shoppingCart");
    }
}
