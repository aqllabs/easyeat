<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceRange extends Model
{
    protected $fillable = ['name', 'symbol', 'min_price', 'max_price', 'display_name'];

    public function venues()
    {
        return $this->hasMany(Venue::class);
    }
}
