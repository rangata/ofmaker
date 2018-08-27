<?php

namespace App\Http\Resources;

use App\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class Offer extends JsonResource
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
            'offerUID' => $this->offerUID,
            'validFrom' => $this->validFrom,
            'validTo' => $this->validTo,
            'period' => $this->period,
            'customer' => \App\Customer::find($this->customer_id),
            'offerItems' => new ProductCollection($this->whenLoaded('products'))
        ];
    }
}
