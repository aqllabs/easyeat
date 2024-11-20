<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Venue;
use App\Models\Cuisine;
use App\Models\HalalAssurance;
use App\Models\VenueType;
use App\Models\PriceRange;
use App\Models\Area;

class VenueSeeder extends Seeder
{
    public function run()
    {
        $csvFile = fopen(base_path("list.csv"), "r");

        // Skip the first line (header)
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if ($firstline) {
                $firstline = false;
                continue;
            }

            // Create venue

            // Handle halal assurance
            $halalAssurance = HalalAssurance::firstOrCreate(['name' => $data[11]]);

            // Handle venue type
            $venueType = VenueType::firstOrCreate(['name' => $data[10]]);

            // Handle price range
            $priceRange = PriceRange::firstOrCreate(['symbol' => $data[12]]);

            // Handle area
            $area = Area::firstOrCreate(['name' => $data[3]]);

            $venue = Venue::create([
                'name' => $data[0],  // Adjust index based on your CSV structure
                'address' => $data[1],
                'city' => $data[2],
                'website' => $data[4],
                'lat' => $data[5],
                'lng' => $data[6],
                'thumbnail_url' => $data[7],
                'images' => json_decode($data[8], true) ?? [],
                'description' => $data[13],
                'remarks' => $data[14],
                'google_maps_url' => $data[18],
                'halal_assurance_id' => $halalAssurance->id,
                'venue_type_id' => $venueType->id,
                'area_id' => $area->id,
                'price_range_id' => $priceRange->id,
            ]);

            // Handle cuisines
            $cuisineNames = explode(',', $data[9]); // Replace 'cuisine_column' with actual column index

            foreach ($cuisineNames as $cuisineName) {
                $cuisineName = trim($cuisineName);

                // Find or create cuisine
                $cuisine = Cuisine::firstOrCreate(
                    [
                        'name' => $cuisineName,
                        'display_name' => ucfirst($cuisineName)
                    ],
                );

                // Attach cuisine to venue
                $venue->cuisines()->attach($cuisine->id);
            }

            $venue->dietCategories()->attach(1);
        }

        fclose($csvFile);
    }
}
