<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('customers', 'CustomerController');
Route::resource('products', 'ProductController');
Route::resource('offers', 'OfferController');

Route::prefix('customers')->group(function () {

    Route::get('/{clientId}/offers/{offerId}', function ($clientId, $offerId) {
            return $clientId . ' ' . $offerId;
    });
});
Route::get('/pao', function () {

   $ofero = \App\Offer::find(1)->load('products');

   $ofero->products();
    return json_encode($ofero);
});
