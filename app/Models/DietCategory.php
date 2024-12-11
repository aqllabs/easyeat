<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DietCategory extends Model
{
    protected $fillable = ['name', 'display_name', 'image'];

    public function venues()
    {
        return $this->belongsToMany(Venue::class);
    }
}
