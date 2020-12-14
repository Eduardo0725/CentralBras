<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\VariationValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if (!$search || $search == 1) {
            return redirect()->route('main');
        }

        $request->paginate = 16;

        $products = new Product;
        $products = $products->search($request);

        foreach ($products as $key => $product) {
            $products[$key]->midia = $product->midia()->where('type', 'image')->get()->all();
        }

        return view('pages.page', ['search' => $search, 'contents' => $products]);
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $midia = $product->midia()->get()->all();
        $images = $product->midia()->where('type', 'image')->get()->all();
        $video = $product->midia()->where('type', 'video')->get()->all();

        $datasheet = $product->datasheet()->get()->all();
        $variations = $product->variation()->get()->all();

        foreach ($variations as $key => $variation)
            $variations[$key]->values = $variation->values()->get()->all();

        $favorite = null;

        if (Auth::check())
            $favorite = Auth::user()->favorites()->where('idProduct', $product->id)->get()->first() ? true : false;

        $data = [
            'product' => $product,
            'midia' => $midia,
            'images' => $images,
            'video' => $video,
            'datasheet' => $datasheet,
            'variations' => $variations,
            'favorite' => $favorite,
        ];

        return view('pages.product', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
