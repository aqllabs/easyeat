<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Info extends Model
{
    use HasFactory, Searchable;


    protected $fillable = [
        'name',
    ];

    public function searchableAs(): string
    {
        return 'info_index';
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
}
