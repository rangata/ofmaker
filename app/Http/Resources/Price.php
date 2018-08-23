<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Price extends JsonResource
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
            'unit_price' => $this->unit_price,
            'end_price' => $this->end_customer_price,
            'discount' => $this->max_discount
        ];
    }
}
