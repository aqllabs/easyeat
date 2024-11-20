<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $fillable = ['name', 'display_name'];

    public function venues()
    {
        return $this->belongsToMany(Venue::class);
    }
}
