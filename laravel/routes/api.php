<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {

    Route::prefix('address')->name('api.address')->group(function() {
        Route::get('/', function () {
            return response('', 200);
        });

        Route::post('/', function (Request $request) {
            return response('', 201);
        });
    });

    Route::prefix('waysToGetPaid')->name('api.waysToGetPaid')->group(function() {
        Route::get('/', function () {
            return response()->json(['waysToGetPaid' => [
                'PagSeguro' => true
            ]])->setStatusCode(200);
        });

        Route::post('/', function (Request $request) {
            return response('', 201);
        });
    });
});
