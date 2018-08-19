<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = [
        'offerUID',
        'validFrom',
        'validTo',
        'period',
        'customer_id'
    ];
}
