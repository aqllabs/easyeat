<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the prices for the product.
     */
    public function prices()
    {
        return $this->hasMany(Price::class, 'product_id', 'stripe_id');
    }
}
