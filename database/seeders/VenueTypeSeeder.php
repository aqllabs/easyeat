<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VenueType;

class VenueTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VenueType::create(['name' => 'restaurant', 'display_name' => 'Restaurant']);
        VenueType::create(['name' => 'cafe', 'display_name' => 'Cafe']);
        VenueType::create(['name' => 'food_court', 'display_name' => 'Food Court']);
        VenueType::create(['name' => 'airport_lounge', 'display_name' => 'Airport Lounge']);
        VenueType::create(['name' => 'bakery_shop', 'display_name' => 'Bakery Shop']);
        VenueType::create(['name' => 'fast_food_snack_shop', 'display_name' => 'Fast Food Snack Shop']);
        VenueType::create(['name' => 'hotel_restaurant', 'display_name' => 'Hotel Restaurant']);
    }
}
