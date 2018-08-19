<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
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
        return $this->hasMany(Offers::class, 'customer_id');
    }
}
