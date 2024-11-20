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

        $this->call(AreasSeeder::class);
        $this->call(CuisinesSeeder::class);
        $this->call(DietCategoriesSeeder::class);
        $this->call(HalalAssurancesSeeder::class);
        $this->call(VenueTypesSeeder::class);
        $this->call(PriceRangesSeeder::class);
        $this->call(VenuesSeeder::class);
        $this->call(CuisineVenueSeeder::class);
        $this->call(DietCategoryVenueSeeder::class);
    }
}
