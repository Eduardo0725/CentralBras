<?php

namespace App\Http\Controllers;

use App\Models\Midia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartAndFavorite extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(bool $cartOrFavorite = false)
    {
        $shoppingCartController = new ShoppingCartController;
        $shoppingCart = $shoppingCartController->index();

        $favorites = Auth::check() ? Auth::user()->favorites()->get()->all() : null;

        $total = 0;
        foreach ($shoppingCart as $value) {
            $total += $value->cost;
        }

        return view('pages.cartAndFavorites', [
            'contentsCart' => $shoppingCart,
            'total' => $total,
            'contentsFavorites' => $favorites,
            'cartOrFavorite' => $cartOrFavorite
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
