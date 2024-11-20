<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DietCategory extends Model
{
    protected $fillable = ['name', 'display_name'];

    public function venues()
    {
        return $this->belongsToMany(Venue::class);
    }
}
