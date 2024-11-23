<?php

namespace Database\Seeders;

use App\Models\Venue;
use App\Models\VenueType;
use App\Models\PriceRange;
use App\Models\Cuisine;
use App\Models\DietCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class ImportVenuesFromJsonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Starting venue import...');

        // Ensure reference data exists
        // $this->seedReferenceData();

        // Get JSON files from storage/app/venues/*.json
        $files = Storage::disk('local')->files('venues');
        $this->command->info(sprintf('Found %d files to process', count($files)));

        foreach ($files as $file) {
            $this->command->info("Processing file: {$file}");

            $venues = json_decode(Storage::disk('local')->get($file), true);

            // Handle both single venue and array of venues
            if (!isset($venues[0])) {
                $venues = [$venues];
            }

            foreach ($venues as $venueData) {
                try {
                    $this->processVenue($venueData);
                    $this->command->info("Processed venue: {$venueData['name']}");
                } catch (\Exception $e) {
                    $this->command->error("Error processing venue {$venueData['name']}: {$e->getMessage()}");
                }
            }
        }
    }

    private function processVenue(array $data): void
    {
        // Skip if venue already exists

        //check if additioanltype is in ['Veg-options', 'Vegan', 'Vegetarian']
        if (isset($data['additionalType']) && !in_array($data['additionalType'], ['Veg-options', 'Vegan', 'Vegetarian'])) {
            return;
        }

        // Find or create venue type
        $venueType = VenueType::firstOrCreate(
            ['name' => 'restaurant'],
            ['display_name' => 'Restaurant']
        );

        $coordinates = $this->geocodeAddress($data['address']['streetAddress']);
        $priceRange = PriceRange::where('symbol', $data['priceRange'])->first();

        //if no price range, set to null
        if (!$priceRange) {
            $priceRange = null;
        }


        // Create venue
        $venue = Venue::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'address' => $data['address']['streetAddress'],
            'city' => 'Hong Kong',
            'telephone' => $data['telephone'] ?? null,
            'website' => $data['url'] ?? null,
            'thumbnail_url' => $data['image'] ?? null,
            'price_range_id' => $priceRange?->id,
            'venue_type_id' => $venueType->id,
            'opening_hours' => json_encode(['raw' => $data['openingHours'] ?? null]),
            'lat' => $coordinates['lat'],
            'lng' => $coordinates['lng'],
            'google_maps_url' => $this->generateGoogleMapsUrl($coordinates['lat'], $coordinates['lng']),
        ]);

        // Process cuisines first
        $cuisineIds = [];
        if (isset($data['servesCuisine'])) {
            $cuisineNames = is_array($data['servesCuisine'])
                ? $data['servesCuisine']
                : array_map('trim', explode(',', $data['servesCuisine']));

            foreach ($cuisineNames as $cuisineName) {
                $cuisine = Cuisine::firstOrCreate(
                    ['name' => strtolower(trim($cuisineName))],
                    ['display_name' => trim($cuisineName)]
                );
                $cuisineIds[] = $cuisine->id;
            }
        }

        // Process diet categories next
        $dietCategoryIds = [];
        if (isset($data['additionalType'])) {
            $dietCategory = DietCategory::firstOrCreate(
                ['name' => strtolower($data['additionalType'])],
                ['display_name' => $data['additionalType']]
            );
            $dietCategoryIds[] = $dietCategory->id;
        }

        // Now attach the relationships to the venue
        if (!empty($cuisineIds)) {
            $venue->cuisines()->attach($cuisineIds);
        }
        if (!empty($dietCategoryIds)) {
            $venue->dietCategories()->attach($dietCategoryIds);
        }
    }

    private function geocodeAddress(string $address): array
    {
        $apiKey = config('services.google.maps_api_key');
        $address = urlencode($address);

        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
            'address' => $address,
            'key' => $apiKey,
        ])->json();

        if ($response['status'] === 'OK') {
            $location = $response['results'][0]['geometry']['location'];
            return [
                'lat' => $location['lat'],
                'lng' => $location['lng'],
            ];
        }

        throw new \Exception("Geocoding failed for address: {$address}");
    }

    private function generateGoogleMapsUrl(float $lat, float $lng): string
    {
        return "https://www.google.com/maps/search/?api=1&query={$lat},{$lng}";
    }

    private function seedReferenceData(): void
    {
        // Venue Types
        $venueTypes = [
            ['name' => 'restaurant', 'display_name' => 'Restaurant'],
            ['name' => 'cafe', 'display_name' => 'Café'],
            ['name' => 'food_court', 'display_name' => 'Food Court'],
            ['name' => 'hawker_stall', 'display_name' => 'Hawker Stall'],
            ['name' => 'bakery', 'display_name' => 'Bakery'],
            ['name' => 'dessert_shop', 'display_name' => 'Dessert Shop'],
        ];

        foreach ($venueTypes as $type) {
            VenueType::firstOrCreate(['name' => $type['name']], $type);
        }

        // Price Ranges
        $priceRanges = [
            ['name' => 'inexpensive', 'symbol' => '$', 'display_name' => 'Under $30', 'min_price' => 0, 'max_price' => 30],
            ['name' => 'moderate', 'symbol' => '$$', 'display_name' => '$30-$60', 'min_price' => 30, 'max_price' => 60],
            ['name' => 'expensive', 'symbol' => '$$$', 'display_name' => '$60-$100', 'min_price' => 60, 'max_price' => 100],
            ['name' => 'very_expensive', 'symbol' => '$$$$', 'display_name' => 'Over $100', 'min_price' => 100, 'max_price' => null],
        ];

        foreach ($priceRanges as $range) {
            PriceRange::firstOrCreate(['name' => $range['name']], $range);
        }

        // Diet Categories
        $dietCategories = [
            ['name' => 'vegan', 'display_name' => 'Vegan'],
            ['name' => 'vegetarian', 'display_name' => 'Vegetarian'],
        ];

        foreach ($dietCategories as $category) {
            DietCategory::firstOrCreate(['name' => $category['name']], $category);
        }

        $this->command->info('Reference data seeded');
    }
}
