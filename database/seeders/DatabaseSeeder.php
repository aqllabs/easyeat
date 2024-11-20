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

        $this->call("areasSeeder");
        $this->call("cuisinesSeeder");
        $this->call("diet_categoriesSeeder");
        $this->call("halal_assurancesSeeder");
        $this->call("venue_typesSeeder");
        $this->call("price_rangesSeeder");
        $this->call("venuesSeeder");
        $this->call("cuisine_venueSeeder");
        $this->call("diet_category_venueSeeder");
    }
}
