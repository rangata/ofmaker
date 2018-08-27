<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Customer extends JsonResource
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
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'city' => $this->city,
            'fullname' => $this->firstname . ' ' . (empty($this->middlename) ? '' :  $this->middlename) .' ' . $this->lastname
        ];
    }
}
