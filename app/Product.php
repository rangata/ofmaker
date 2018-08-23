<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $fillable = [
        'title',
        'model',
        'type'
    ];

    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }

    public function price()
    {
        return $this->hasMany(Price::class);

    }
}
