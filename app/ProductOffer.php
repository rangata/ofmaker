<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{

    protected $fillable = [
        'unitPrice',
        'endPrice',
        'qty',
        'lineTotal',
        'product_id',
        'offer_id'
    ];
}
