<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $step = (Session::has('nextCreationStep') ? Session::get('nextCreationStep')['step'] : 'product');

        $pages = [
            "product" => "createProductOfAd",
            "address" => "createAddressOfAd",
            "waysToGetPaid" => "selectWayToGetPaidOfAd",
            "warranty" => "warrantyOfAd",
            "finished" => "creationOfFinishedAd",
        ];

        if(isset(Session::get('nextCreationStep')['step']) && Session::get('nextCreationStep')['step'] === 'finished'){
            $data = ['idProduct' => Session::get('nextCreationStep')['idProduct']];
            Session::forget('nextCreationStep');
        }

        if (isset($pages[$step])) {
            return view("pages.user.{$pages[$step]}", $data ?? []);
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
        $step = (Session::has('nextCreationStep') ? Session::get('nextCreationStep')['step'] : 'product');

        switch ($step) {
            case 'product':
                $userId = \App\Models\User::find(Auth::user()->id)->id;

                $product = [
                    'idUser' => $userId,
                    'idCategory' => 17,
                    'name' => $request->productTitle,
                    'amount' => $request->productAmount,
                    'description' => $request->productDescription,
                    'datasheet' => $request->datasheet,
                    'variations' => $request->variations,
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
                        'images' => $request->images,
                        'midia' => $request->midia || ''
                    ],
                ]);

                break;

            case 'address':
                $data = Session::get('nextCreationStep')['data'];
                $data['product']['addresses'] = json_encode(['id' => $request->address]);

                Session::put('nextCreationStep', [
                    'step' => 'waysToGetPaid',
                    'data' => $data
                ]);
            break;

            case 'waysToGetPaid':
                $data = Session::get('nextCreationStep')['data'];
                $data['product']['idWaysToReceivePayments'] = 1;

                Session::put('nextCreationStep', [
                    'step' => 'warranty',
                    'data' => $data
                ]);
            break;

            case 'warranty':
                $data = Session::get('nextCreationStep')['data'];

                $type = $request->warranty;
                $day = '';
                $month = '';
                $year = '';

                if($type === 'vendor') {
                    $day = $request->vendorDay;
                    $month = $request->vendorMonth;
                    $year = $request->vendorYear;
                }

                if($type === 'manufacturer') {
                    $day = $request->manufacturerDay;
                    $month = $request->manufacturerMonth;
                    $year = $request->manufacturerYear;
                }

                $data['product']['warranty'] = json_encode([
                    'type' => $type,
                    'day' => $day,
                    'month' => $month,
                    'year' => $year
                ]);

                // Saving images
                $midiaPath = [
                    'midia' => $data['midia'],
                    'images' => []
                ];

                $imagesJson = json_decode($data['images'], true);

                foreach ($imagesJson as $key => $value) {
                    $newValue = explode(',', $value);
                    $newValue[0] = str_replace(';base64', '', $newValue[0]);
                    $newValue[0] = str_replace('data:', '', $newValue[0]);

                    $image = base64_decode($newValue[1]);
                    $path = 'products/' . $data['product']['idUser'] . '/' . rand() . rand() . $key;

                    Storage::disk()->put($path, $image);

                    array_push($midiaPath['images'], [
                        'title' => $key,
                        'path' => $path,
                        'type' => $newValue[0]
                    ]);
                }

                $data['product']['linkMedia'] = json_encode($midiaPath);

                // Creating product
                $product = Product::create($data['product']);

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
