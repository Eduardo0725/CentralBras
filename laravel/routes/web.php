<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    for ($i = 1; $i <= 16; $i++) {
        array_push($contents, $card);
    }

    return view('main', ['contents' => $contents]);
})->name('main');

Route::get('page', 'ProductController@index')->name('page');

Route::prefix('product/{product}')->group(function () {
    Route::get('/', 'ProductController@show')->name('product');

    Route::get('comment', function (Product $product) {
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

        $product->midia = $product->midia()->where('type', 'image')->get()->first();

        return view('pages.comment', ['product' => $product]);
    })->name('product.comment');

    Route::post('comment', function ($product) {
        $id = $product;

        return redirect()->route('product', ['product' => ['id' => $id]]);
    })->name('product.comment');
});

Route::post('shoppingCart/{idProduct}', 'ShoppingCartController@store')->name('shoppingCart.store');
Route::delete('shoppingCart/{idProduct}/{idShoppingCart}', 'ShoppingCartController@destroy')->name('shoppingCart.delete');

Route::get('cartAndFavorites/{cartOrFavorite?}', 'ShoppingCartAndFavorite@index')->name('cartAndFavorites');

Route::prefix('purchases')->group(function () {
    Route::get('/', function () {
        return redirect()->route('purchases.frete');
    })->name('purchases');

    Route::match(['GET', 'POST'], 'frete', function () {
        return view('pages.frete');
    })->name('purchases.frete');

    Route::match(['GET', 'POST'], 'paymethod', function () {
        return view('pages.paymethod');
    })->name('purchases.paymethod');

    Route::match(['GET', 'POST'], 'paymentReview', function () {
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

        for ($i = 1; $i <= 4; $i++) {
            array_push($contents, $card);
        }

        return view('pages.paymentReview', ['contents' => $contents]);
    })->name('purchases.review');

    Route::match(['GET', 'POST'], 'paymentConfirmed', function () {
        return view('pages.paymentConfirmed');
    })->name('purchases.confirmed');
});

Route::middleware('auth')->group(function () {
    Route::prefix('account')->group(function () {
        Route::get('/', 'AccountController@index')->name('account.index');

        Route::get('logout', 'AccountController@logout')->name('account.logout');

        Route::get('waysToGetPaid/check/{type}', 'WaysToReceivePaymentController@check');
        Route::post('waysToGetPaid', 'WaysToReceivePaymentController@store');

        Route::resource('addresses', 'AddressController')->names('addresses')->only(['index', 'store', 'update', 'destroy']);

        Route::resource('users', 'UserController')->names('users')->only(['update']);

        Route::resource('cards', 'CardController')->names('cards')->only(['store', 'destroy']);

        Route::post('favorite/{idProduct}', 'FavoriteController@store')->name('favorite.store');
        Route::delete('favorite/{idProduct}', 'FavoriteController@destroy')->name('favorite.delete');
    });

    Route::prefix('myaccount')->group(function () {
        Route::match(['GET', 'POST'], '/', function () {
            return redirect()->route('myaccount.config');
        })->name('myaccount');

        Route::get('config', 'ConfigController@index')->name('myaccount.config');

        Route::prefix('purchases')->group(function () {
            Route::get('/', function () {
                return view('pages.user.shopping', ['sidebar' => 'shopping']);
            })->name('myaccount.purchases');

            Route::get('id/{id?}', function () {
                return view('pages.user.shoppingDetail', ['sidebar' => 'shopping']);
            })->name('myaccount.purchases.purchase');
        });

        Route::resource('sales', 'SalesController')->names('myaccount.sales');

        Route::prefix('ads')->group(function () {
            Route::get('/', 'AdsController@index')->name('myaccount.ads.index');

            Route::prefix('create')->group(function () {
                Route::match(['GET', 'POST'], '/{page?}', 'AdsController@create')->name('myaccount.ads.create');

                Route::post('/{page?}', 'AdsController@store')->name('myaccount.ads.store');
            });
        });
    });
});

Route::middleware('guest')->group(function () {
    Route::prefix('account')->group(function () {
        Route::get('/', 'AccountController@index')->name('account.index');

        Route::post('login', 'AccountController@login')->name('account.login');

        Route::get('register', 'AccountController@formRegister')->name('account.register');
        Route::post('register', 'AccountController@register')->name('account.register');
    });

    Route::get('google', function () {
        return view('pages.emailVerification');
    })->name('account.google');

    Route::get('register', function () {
        return view('pages.register');
    })->name('register');
});
