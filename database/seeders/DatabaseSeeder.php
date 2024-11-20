<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(UserSeeder::class);
        // $this->call(TeamSeeder::class);
        // $this->call(PermissionSeeder::class);
        // $this->call(RoleSeeder::class);
        // $this->call(DietCategorySeeder::class);
        // $this->call(HalalAssuranceSeeder::class);
        // $this->call(VenueTypeSeeder::class);
        // $this->call(PriceRangeSeeder::class);
        // $this->call(AreaSeeder::class);
        // $this->call(VenueSeeder::class);

        $this->call(areasSeeder::class);
        $this->call(cuisinesSeeder::class);
        $this->call(diet_categoriesSeeder::class);
        $this->call(halal_assurancesSeeder::class);
        $this->call(venue_typesSeeder::class);
        $this->call(price_rangesSeeder::class);
        $this->call(venuesSeeder::class);
        $this->call(cuisine_venueSeeder::class);
        $this->call(diet_category_venueSeeder::class);
    }
}
