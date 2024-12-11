<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VenueType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'display_name', 'image'];

    public function venues(): HasMany
    {
        return $this->hasMany(Venue::class);
    }
}
