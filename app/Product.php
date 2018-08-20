<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
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
}