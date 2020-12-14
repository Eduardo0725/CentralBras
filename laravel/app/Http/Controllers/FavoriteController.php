<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (!Product::find($idProduct))
            return response('', 404);

        if (!Auth::user()->favorites()->where('idProduct', $idProduct)->get()->first()) {
            Favorite::create([
                'idUser' => Auth::user()->id,
                'idProduct' => $idProduct
            ]);
        }

        return response('', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $idProduct)
    {
        if (!Product::find($idProduct))
            return response('', 404);

        try {
            $favorite = Favorite::where('idUser', Auth::user()->id)->where('idProduct', $idProduct)->get()->first();

            if ($favorite)
                $favorite->delete();

            return response('', 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 201);
        }
    }
}
