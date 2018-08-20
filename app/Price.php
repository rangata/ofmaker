<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    protected $fillable = [
        'unit_price',
        'end_customer_price',
        'max_discount',
        'inc_vat',
        'product_id'
    ];


}
