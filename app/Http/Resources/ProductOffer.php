<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductOffer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'unitPrice' => $this->unitPrice,
            'endPrice' => $this->endPrice,
            'qty' => $this->qty,
            'lineTotal' => $this->lineTotal,
            'product_id' => '',
            'offer_id' => ''
        ];
    }
//    TODO FINISH IT!
}
