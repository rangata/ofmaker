<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all()->load(['products']);

        $offers = json_encode($offers);

        return view('offers.index', compact('offers'));
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
     * @param  \App\Offer  $offers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offers = Offer::findOrFail($id)->load(['products']);
        $offers = json_encode($offers);
        return view('offers.show', compact('offers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offers
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offers)
    {
        //
    }
}
