<?php

namespace App\Http\Controllers;

use App\Models\Midia;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Throwable;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = [];

        if (Auth::check()) {
            $shoppingCarts = Auth::user()->shoppingCart()->get()->all();

            foreach ($shoppingCarts as $shoppingCart) {
                if (!$shoppingCart->info) continue;

                $shoppingCart->info = json_decode($shoppingCart->info, true);

                foreach ($shoppingCart->info['selected'] as $shoppingCartId => $variationsArray) {
                    $product = Product::find($shoppingCart->idProduct);

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
        } else {
            $products = SessionController::getAllShoppingCart();
        }

        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $idProduct)
    {
        $array = [];

        foreach ($request->all() as $key => $value) {
            if ($key > 0 && $value > 0) {
                $array["$key"] = $value;
            }
        }

        $idSelectedVariationContent = "$idProduct." .  implode('.', $array);
        $selected[$idSelectedVariationContent] = $array;

        if (Auth::check()) {
            try {
                $shoppingCart = Auth::user()->shoppingCart()->where('idProduct', $request->idProduct)->get()->first();

                if (!$shoppingCart) {
                    ShoppingCart::create([
                        'idUser' => Auth::user()->id,
                        'idProduct' => $request->idProduct,
                        'info' => json_encode([
                            'selected' => $selected
                        ])
                    ]);
                } else {
                    $shoppingCartInfo = $shoppingCart->info != null ? json_decode($shoppingCart->info, true) : ['selected' => []];

                    $key = array_keys($selected)[0];
                    $value = array_values($selected)[0];

                    $shoppingCartInfo['selected']["$key"] = $value;

                    $shoppingCart->info = json_encode($shoppingCartInfo);
                    $shoppingCart->save();
                }
            } catch (\Throwable $th) {
                return redirect()->back();
            }
        } else {
            if (!SessionController::setShoppingCart($request->idProduct, $selected))
                return redirect()->back();
        }

        return redirect()->route('cartAndFavorites');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy($idProduct, $idShoppingCart)
    {
        if (Auth::check()) {
            Auth::user()->shoppingCart()->where('idProduct', $idProduct)->delete();
        } else {
            $status = SessionController::deleteShoppingCart($idProduct, $idShoppingCart);

            if (!$status)
                return redirect()->back()->withErrors(['error' => 'Não foi possivel remover o produto do carrinho.']);
        }

        return redirect()->back();
    }
}
