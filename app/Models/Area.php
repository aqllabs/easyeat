<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'display_name', 'image'];

    public function venues()
    {
        return $this->hasMany(Venue::class);
    }
}
