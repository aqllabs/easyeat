<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    /**
     * Get the product that owns the price.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'stripe_id');
    }

    /**
     * Get the orders for the price.
     */
    public function orders()
    {
        return $this->hasMany(StripeOrder::class, 'price_id', 'stripe_id');
    }
}
