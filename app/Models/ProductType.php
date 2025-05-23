<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['name', 'display_name', 'image'];

    public function foodProducts()
    {
        return $this->belongsToMany(FoodProduct::class, 'food_product_product_type');
    }
} 