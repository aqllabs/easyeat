<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class venue_typesSeeder extends Seeder
{
    public function run()
    {
        DB::table('venue_types')->insert([
            'id' => 1,
            'name' => 'restaurant',
            'display_name' => 'Restaurant',
            'created_at' => 1732055703000,
            'updated_at' => 1732055708000,
        ]);
        DB::table('venue_types')->insert([
            'id' => 8,
            'name' => 'food-court',
            'display_name' => 'Food Court',
            'created_at' => '2024-11-20 04:20:10',
            'updated_at' => '2024-11-20 04:20:10',
        ]);
        DB::table('venue_types')->insert([
            'id' => 9,
            'name' => 'hotel-restaurant',
            'display_name' => 'Hotel Restaurant',
            'created_at' => '2024-11-20 04:20:10',
            'updated_at' => '2024-11-20 04:20:10',
        ]);
        DB::table('venue_types')->insert([
            'id' => 10,
            'name' => 'fast-food-snack-shop',
            'display_name' => 'Fast Food or Snack Shop',
            'created_at' => '2024-11-20 04:20:11',
            'updated_at' => '2024-11-20 04:20:11',
        ]);
        DB::table('venue_types')->insert([
            'id' => 11,
            'name' => 'theme-park-restaurant-kiosk',
            'display_name' => 'Theme Park Restaurant Kiosk',
            'created_at' => '2024-11-20 04:20:11',
            'updated_at' => '2024-11-20 04:20:11',
        ]);
        DB::table('venue_types')->insert([
            'id' => 12,
            'name' => 'other',
            'display_name' => 'Other',
            'created_at' => '2024-11-20 04:20:11',
            'updated_at' => '2024-11-20 04:20:11',
        ]);
        DB::table('venue_types')->insert([
            'id' => 13,
            'name' => 'airport-lounge',
            'display_name' => 'Airport Lounge',
            'created_at' => '2024-11-20 04:20:19',
            'updated_at' => '2024-11-20 04:20:19',
        ]);
        DB::table('venue_types')->insert([
            'id' => 14,
            'name' => 'takeaway',
            'display_name' => 'Takeaway',
            'created_at' => '2024-11-20 04:20:20',
            'updated_at' => '2024-11-20 04:20:20',
        ]);
        DB::table('venue_types')->insert([
            'id' => 15,
            'name' => 'bakery-shop',
            'display_name' => 'Bakery Shop',
            'created_at' => '2024-11-20 04:20:22',
            'updated_at' => '2024-11-20 04:20:22',
        ]);
    }
}
