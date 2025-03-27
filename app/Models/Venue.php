<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Venue extends Model
{
    use HasFactory, Searchable;


    protected $fillable = [
        'name',
        'description',
        'city',
        'area_id',
        'address',
        'telephone',
        'email',
        'website',
        'google_maps_url',
        'thumbnail_url',
        'images',
        'remarks',
        'lng',
        'lat',
        'price_range_id',
        'halal_assurance_id',
        'venue_type',
        'halal_assurance_expiry_date',
        'vegetarian_type_id',
        'no_alcohol',
    ];

    protected $casts = [
        'images' => 'array',
        'remarks' => 'array',
    ];

    public function toSearchableArray()
    {
        $array = [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'city' => $this->city,
            'area' => $this->area?->display_name ?? null,
            'address' => $this->address,
            'telephone' => $this->telephone,
            'email' => $this->email,
            'website' => $this->website,
            'google_maps_url' => $this->google_maps_url,
            'cuisines' => $this->cuisines?->pluck('display_name')->toArray() ?? [],
            'diet_categories' => $this->dietCategories?->pluck('display_name')->toArray() ?? [],
            'halal_assurance' => $this->halalAssurance?->display_name ?? null,
            'price_range' => $this->priceRange?->display_name ?? null,
            'venue_type' => $this->venueType?->display_name ?? null,
            'food_types' => $this->foodTypes?->pluck('display_name')->toArray() ?? [],
            'thumbnail_url' => $this->thumbnail_url,
            'opening_hours' => $this->opening_hours,
            'vegetarian_type' => $this->vegetarianType?->display_name ?? null,
            'no_alcohol' => $this->no_alcohol,
            '_geo' => [
                'lat' => (float) $this->lat,
                'lng' => (float) $this->lng,
            ]
        ];

        return $array;
    }

    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class);
    }

    public function dietCategories()
    {
        return $this->belongsToMany(DietCategory::class);
    }

    public function halalAssurance()
    {
        return $this->belongsTo(HalalAssurance::class);
    }

    public function priceRange()
    {
        return $this->belongsTo(PriceRange::class);
    }

    public function venueType()
    {
        return $this->belongsTo(VenueType::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function vegetarianType()
    {
        return $this->belongsTo(VegetarianType::class);
    }

    public function foodTypes()
    {
        return $this->belongsToMany(FoodType::class);
    }
}
