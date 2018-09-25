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

    public function scopeBasicProducts($query)
    {
        return $query->where('type', '=', 'Основен продукт')
            ->orWhere('type','=','top');
    }
    public function scopeAdditionalProducts($query)
    {
        return $query->where('type', '=', 'Вторичен/периферия')
            ->orWhere('type','=','extra');
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
