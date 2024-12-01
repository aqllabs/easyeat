<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VegetarianType extends Model
{
    protected $fillable = ['name', 'display_name'];

    public function venues()
    {
        return $this->hasMany(Venue::class);
    }
}
