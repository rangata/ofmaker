<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    protected $fillable = [
        'optionTitle',
        'optionValue',
        'optionDisplayText',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
