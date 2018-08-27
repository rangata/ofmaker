<?php

namespace App\Http\Controllers\API;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request['product']['title'];
        $product->model = $request['product']['model'];
        $product->type = $request['product']['type'];

        $product->save();

        $price = new \App\Price();
        $price->unit_price = $request['product']['price']['unit_price'];
        $price->end_customer_price = $request['product']['price']['end_customer_price'];
        $price->max_discount = $request['product']['price']['max_discount'];
        $price->product_id = $product->id;

        $product->price()->save($price);
//        $product->price()->create($request['product']['price']);

        return response()->json('ok');

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
