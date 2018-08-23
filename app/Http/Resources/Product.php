<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'id' => $this->id,
            'fulltitle' => $this->title . ' ' . $this->model,
            'type' => $this->type,
            'price' => Price::collection($this->price)
        ];
    }
}
