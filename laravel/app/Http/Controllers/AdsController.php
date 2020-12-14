<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Datasheet;
use App\Models\Midia;
use App\Models\Product;
use App\Models\ShoppingAndSale;
use App\Models\Variation;
use App\Models\VariationValue;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user->product()->get()->all());
        $products = $user->product()->get()->all();

        // dd($products);

        $data = [];

        foreach ($products as $product) {
            array_push($data, [
                'id' => $product->id,
                'category' => $product->category()->get()->first()->name ?? null,
                'name' => $product->name,
                'amount' => $product->amount,
                'description' => $product->description,
                'image' => $product->midia()->where('type', 'image')->get()->first()->path ?? null,
                'productSituation' => $product->productSituation,
                'universalCode' => $product->universalCode,
                'brand' => $product->brand,
                'model' => $product->model,
                'cost' => $product->cost,
                'warranty' => $product->warranty,
                'day' => $product->warrantyDay,
                'month' => $product->warrantyMonth,
                'year' => $product->warrantyYear,
                // 'sales' => '',
            ]);
        }

        // dd($data);
        return view('pages.user.ads', ['sidebar' => 'sales', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $step = Session::get('nextCreationStep.step', 'product');

        $pages = [
            "product" => "createProductOfAd",
            "address" => "createAddressOfAd",
            "waysToGetPaid" => "selectWayToGetPaidOfAd",
            "warranty" => "warrantyOfAd",
            "finished" => "creationOfFinishedAd",
        ];

        if (Session::get('nextCreationStep.step') === 'address') {
            $data = ['addresses' => Auth::user()->addresses()->get()->all(), 'sidebar' => 'sales'];
        }

        if (Session::get('nextCreationStep.step') === 'finished') {
            $data = ['idProduct' => Session::get('nextCreationStep.idProduct'), 'sidebar' => 'sales'];
            Session::forget('nextCreationStep');
        }

        if (isset($pages[$step])) {
            return view("pages.user.{$pages[$step]}", $data ?? ['sidebar' => 'sales']);
        }

        return redirect()->route("main");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $step = Session::get('nextCreationStep.step', 'product');

        switch ($step) {
            case 'product':
                $product = [
                    'idUser' => Auth::user()->id,
                    'idCategory' => 8,
                    'name' => $request->productTitle,
                    'amount' => $request->productAmount,
                    'description' => $request->productDescription,
                    'productSituation' => $request->productSituation === 'old',
                    'universalCode' => $request->productCod,
                    'brand' => $request->productBrand,
                    'model' => $request->productModel,
                    'cost' => (float) str_replace(',', '.', $request->productPrice),
                ];

                Session::put('nextCreationStep', [
                    'step' => 'address',
                    'data' => [
                        'product' => $product,
                        'datasheet' => json_decode($request->datasheet, true),
                        'variations' => json_decode($request->variations, true),
                        'images' => $request->images,
                        'video' => $request->video ?? null
                    ],
                ]);

                break;

            case 'address':
                $address = ['id' => $request->address];

                $waysToReceivePayments = Auth::user()->waysToReceivePayments()->where('selected', true)->get()->first();

                $step = !$waysToReceivePayments ? 'waysToGetPaid' : 'warranty';

                Session::put('nextCreationStep.step', $step);
                Session::push('nextCreationStep.data', $address);
                break;

            case 'waysToGetPaid':
                $waysToGetPaid = Auth::user()->waysToReceivePayments()->where('type', $request->waysToGetPaid)->get()->first();
                $waysToGetPaid->selected = true;
                $waysToGetPaid->save();

                Session::put('nextCreationStep.step', 'warranty');
                break;

            case 'warranty':
                $data = Session::get('nextCreationStep.data');

                $data['product']['warranty'] = $request->warranty;

                if ($data['product']['warranty'] === 'vendor') {
                    $data['product']['warrantyDay'] = $request->vendorDay;
                    $data['product']['warrantyMonth'] = $request->vendorMonth;
                    $data['product']['warrantyYear'] = $request->vendorYear;
                }

                if ($data['product']['warranty'] === 'manufacturer') {
                    $data['product']['warrantyDay'] = $request->manufacturerDay;
                    $data['product']['warrantyMonth'] = $request->manufacturerMonth;
                    $data['product']['warrantyYear'] = $request->manufacturerYear;
                }

                // Saving midia
                $midias = [[
                    'type' => 'video',
                    'path' => $data['video'],
                ]];

                $images = json_decode($data['images'], true);

                foreach ($images as $key => $value) {
                    $imageBase64 = explode(',', $value);
                    $image = base64_decode($imageBase64[1]);

                    $path = 'products/' . Auth::user()->id . '/' . (new DateTime('America/Sao_Paulo'))->format('dmYHis') . $key;

                    Storage::disk()->put($path, $image);

                    array_push($midias, [
                        'type' => 'image',
                        'path' => $path
                    ]);
                }

                // Creating product
                $product = Product::create($data['product']);

                // Creating midia
                foreach ($midias as $midia) {
                    Midia::create([
                        'idProduct' => $product->id,
                        'type' => $midia['type'],
                        'path' => $midia['path']
                    ]);
                }

                // Creating variations
                foreach ($data['variations'] as $variations) {
                    $result = Variation::create([
                        'idProduct' => $product->id,
                        'name' => $variations['name']
                    ]);

                    foreach ($variations['values'] as $value) {
                        VariationValue::create([
                            'idVariation' => $result->id,
                            'value' => $value
                        ]);
                    }
                }

                // Creating datasheet
                foreach ($data['datasheet'] as $datasheet) {
                    Datasheet::create([
                        'idProduct' => $product->id,
                        'name' => $datasheet['name'],
                        'description' => $datasheet['description']
                    ]);
                }

                Session::put('nextCreationStep', [
                    'step' => 'finished',
                    'idProduct' => $product->id
                ]);
                break;
        }

        return redirect()->route('myaccount.ads.create');
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
