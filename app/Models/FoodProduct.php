<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class FoodProduct extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'description',
        'images',
        'thumbnail_url',
        'website',
        'venue_id',
        'is_halal',
        'no_alcohol',
        'shop_info',
    ];

    protected $casts = [
        'images' => 'array',
        'shop_info' => 'array',
        'is_halal' => 'boolean',
        'no_alcohol' => 'boolean',
    ];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'website' => $this->website,
            'product_types' => $this->productTypes?->pluck('display_name')->toArray() ?? [],
            'dietary_requirements' => $this->dietaryRequirements?->pluck('display_name')->toArray() ?? [],
            'is_halal' => $this->is_halal,
            'no_alcohol' => $this->no_alcohol,
            'venue' => $this->venue?->name ?? null,
        ];
    }

    public function productTypes()
    {
        return $this->belongsToMany(ProductType::class, 'food_product_product_type');
    }

    public function dietaryRequirements()
    {
        return $this->belongsToMany(DietaryRequirement::class, 'dietary_requirement_food_product');
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
} 