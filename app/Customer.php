<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =
        [
            'firstname',
            'middlename',
            'lastname',
            'mobile',
            'email',
            'city'
        ];

    public function offers()
    {
        return $this->hasMany(Offer::class, 'customer_id');
    }
}
