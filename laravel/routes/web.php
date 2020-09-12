<?php

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
    $url_image = 'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg';
    $card = [
        'imgMainSrc' => 'https://images-americanas.b2w.io/produtos/01/00/img/462139/7/462139728_1SZ.jpg',
        'description' => 'Smartphone Motorola Moto G8 Plus 64GB Dual Chip Android 6.3" Qualcomm Snapdragon 665 (SM6125) 4G Câmera 48MP + 5MP + 16MP',
        'interest' => '12x R$ 124,99 sem juros',
        'discount' => '20% OFF',
        'cost' => 'R$ 1.499,90',
        'stars' => 3.5
    ];
    return view('main', ['url_image' => $url_image, 'card' => $card, 'count' => 1]);
})->name('main');
