<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->group(function () {
   Route::get('/', function () {

       $products = \App\Product::all();
       $products = new \App\Http\Resources\ProductCollection($products);
       return $products;
   });

   Route::post('/', 'API\ProductController@store');
   Route::get('/show/{id}', 'API\ProductController@show');
    Route::get('/basics', function() {
        $basic = \App\Product::basicProducts()->get();
        $basics = new \App\Http\Resources\ProductCollection($basic);
        return $basics;
    });
});


Route::prefix('customers')->group(function () {
    Route::get('/', 'API\CustomerController@index');
//    Route::post('/', 'API\OfferController@store');
//    Route::delete('/', 'API\OfferController@destroy');
//
//    Route::get('/{id}', 'API\OfferController@show' );

});

Route::prefix('offers')->group(function () {
    Route::get('/', 'API\OfferController@index');
    Route::post('/', 'API\OfferController@store');
    Route::delete('/', 'API\OfferController@destroy');

    Route::get('/{id}', 'API\OfferController@show' );

});
