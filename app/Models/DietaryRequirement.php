<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DietaryRequirement extends Model
{
    protected $fillable = ['name', 'display_name', 'image'];

    public function foodProducts()
    {
        return $this->belongsToMany(FoodProduct::class, 'dietary_requirement_food_product');
    }
} 