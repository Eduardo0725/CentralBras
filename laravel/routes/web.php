<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    $card = [
        'id' => '1234567890',
        'imgMainSrc' => 'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg',
        'description' => 'Smartphone Motorola Moto G8 Plus 64GB Dual Chip Android 6.3" Qualcomm Snapdragon 665 (SM6125) 4G Câmera 48MP + 5MP + 16MP',
        'interest' => '12x R$ 124,99 sem juros',
        'discount' => '20% OFF',
        'cost' => 'R$ 1.499,90',
        'stars' => 3.5
    ];

    $contents = [];

    for($i = 1; $i <= 16; $i++){
        array_push($contents, $card);
    }

    return view('main', ['contents' => $contents]);
})->name('main');

Route::get('/page/{page?}', function (int $page = 1, Request $request) {

    $search = $request->input('search');

    if(!$search || $search == 1) {
        return redirect('/');;
    }

    $pagesMax = 40;

    $card = [
        'id' => '1234567890',
        'imgMainSrc' => 'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg',
        'description' => 'Smartphone Motorola Moto G8 Plus 64GB Dual Chip Android 6.3" Qualcomm Snapdragon 665 (SM6125) 4G Câmera 48MP + 5MP + 16MP',
        'interest' => '12x R$ 124,99 sem juros',
        'discount' => '20% OFF',
        'cost' => 'R$ 1.499,90',
        'stars' => 3.5
    ];

    $contents = [];

    for($i = 1; $i <= 16; $i++){
        array_push($contents, $card);
    }

    if($page > $pagesMax || $pagesMax === 0) return view('pages.error404');

    return view('pages.page', ['search' => $search, 'contents' => $contents, 'page' => $page, 'pagesMax' => $pagesMax]);
})->name('page');

Route::get('/product/{id}', function (string $id) {
    $card = [
        'id' => '1234567890',
        'imgMainSrc' => 'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg',
        'imgs' => [
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_2SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_4SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_5SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_6SZ.jpg'
        ],
        'description' => 'Smartphone Motorola Moto G8 Plus 64GB Dual Chip Android 6.3" Qualcomm Snapdragon 665 (SM6125) 4G Câmera 48MP + 5MP + 16MP',
        'interest' => '12x R$ 124,99 sem juros',
        'discount' => '20% OFF',
        'cost' => 'R$ 1.499,90',
        'stars' => 3.5
    ];

    $contents = [];

    for($i = 1; $i <= 16; $i++){
        array_push($contents, $card);
    }

    return view('pages.product', ['contents' => $contents, 'product' => $card]);
})->name('product');

Route::get('/product/{id}/comment', function(string $id) {
    $card = [
        'id' => '1234567890',
        'imgMainSrc' => 'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg',
        'imgs' => [
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_2SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_4SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_5SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_6SZ.jpg'
        ],
        'description' => 'Smartphone Motorola Moto G8 Plus 64GB Dual Chip Android 6.3" Qualcomm Snapdragon 665 (SM6125) 4G Câmera 48MP + 5MP + 16MP',
        'interest' => '12x R$ 124,99 sem juros',
        'discount' => '20% OFF',
        'cost' => 'R$ 1.499,90',
        'stars' => 3.5
    ];

    return view('pages.comment', ['product' => $card]);
})->name('comment');

Route::post('/commentProcess', function (Request $request) {
    $id = $request->input('id');

    return redirect(route('product', ['id' => $id]));
})->name('commentProcess');

Route::get('/cartAndFavorites/{cartOrFavorite?}', function (bool $cartOrFavorite = false) {
    $card = [
        'id' => '1234567890',
        'imgMainSrc' => 'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg',
        'imgs' => [
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_2SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_4SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_5SZ.jpg',
            'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_6SZ.jpg'
        ],
        'description' => 'Smartphone Motorola Moto G8 Plus 64GB Dual Chip Android 6.3" Qualcomm Snapdragon 665 (SM6125) 4G Câmera 48MP + 5MP + 16MP',
        'categories' => [
            'Cor' => 'Azul'
        ],
        'amountAvailable' => '100',
        'amountSelected' => '1',
        'interest' => '12x R$ 124,99 sem juros',
        'discount' => '20% OFF',
        'cart' => true,
        'favorite' => true,
        'cost' => 1499.9,
        'stars' => 3.5
    ];

    $contents = [];

    for($i = 1; $i <= 4; $i++){
        array_push($contents, $card);
    }

    return view('pages.cartAndFavorites', ['contentsCart' => $contents, 'contentsFavorites' => [$card], 'cartOrFavorite' => $cartOrFavorite]);
})->name('cartAndFavorites');

Route::prefix('/buy')->group(function(){

    Route::get('/frete', function(){
        return view('pages.frete');
    })->name('frete');

    Route::get('/paymethod', function(){
        return view('pages.paymethod');
    })->name('paymethod');

    Route::get('/paymentReview', function(){
        $card = [
            'id' => '1234567890',
            'imgMainSrc' => 'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg',
            'imgs' => [
                'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg',
                'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_2SZ.jpg',
                'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_4SZ.jpg',
                'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_5SZ.jpg',
                'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_6SZ.jpg'
            ],
            'description' => 'Smartphone Motorola Moto G8 Plus 64GB Dual Chip Android 6.3" Qualcomm Snapdragon 665 (SM6125) 4G Câmera 48MP + 5MP + 16MP',
            'categories' => [
                'Cor' => 'Azul'
            ],
            'amountAvailable' => '100',
            'amountSelected' => '1',
            'interest' => '12x R$ 124,99 sem juros',
            'discount' => '20% OFF',
            'cart' => true,
            'favorite' => true,
            'cost' => 1499.9,
            'stars' => 3.5
        ];

        $contents = [];

        for($i = 1; $i <= 4; $i++){
            array_push($contents, $card);
        }

        return view('pages.paymentReview', ['contents' => $contents]);
    })->name('paymentReview');

    Route::get('/paymentConfirmed', function() {
        return view('pages.paymentConfirmed');
    })->name('paymentConfirmed');
});
