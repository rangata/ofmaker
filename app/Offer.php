<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'offerUID',
        'validFrom',
        'validTo',
        'period',
        'customer_id'
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_offer')
                ->withPivot(['unitPrice',
                            'endPrice',
                            'qty',
                            'lineTotal']);
    }
}
