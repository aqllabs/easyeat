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
    ];

    protected $casts = [
        'images' => 'array',
        'remarks' => 'array',
    ];

    public function toSearchableArray()
    {
        $array['id'] = $this->id;
        $array['name'] = $this->name;
        $array['description'] = $this->description;
        $array['city'] = $this->city;
        $array['area'] = $this->area->display_name;
        $array['address'] = $this->address;
        $array['telephone'] = $this->telephone;
        $array['email'] = $this->email;
        $array['website'] = $this->website;
        $array['google_maps_url'] = $this->google_maps_url;
        $array['cuisines'] = $this->cuisines->pluck('display_name')->toArray();
        $array['diet_categories'] = $this->dietCategories->pluck('display_name')->toArray();
        $array['halal_assurance'] = $this->halalAssurance->display_name;
        $array['price_range'] = $this->priceRange->display_name;
        $array['venue_type'] = $this->venueType->display_name;
        $array['thumbnail_url'] = $this->thumbnail_url;

        $array['_geo'] = [
            'lat' => (float) $this->lat,
            'lng' => (float) $this->lng,
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
}
