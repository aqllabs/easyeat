<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class halal_assurancesSeeder extends Seeder
{
    public function run()
    {
        DB::table('halal_assurances')->insert([
            'id' => 5,
            'name' => 'muslim-owned-restaurant',
            'display_name' => 'Muslim-Owned Venue',
            'created_at' => '2024-11-20 04:20:09',
            'updated_at' => '2024-11-20 04:20:09',
        ]);
        DB::table('halal_assurances')->insert([
            'id' => 6,
            'name' => 'certified-muslim-friendly-restaurant',
            'display_name' => 'Certified Muslim-Friendly Venue',
            'created_at' => '2024-11-20 04:20:10',
            'updated_at' => '2024-11-20 04:20:10',
        ]);
        DB::table('halal_assurances')->insert([
            'id' => 7,
            'name' => 'halal-certified-kitchen',
            'display_name' => 'Halal Certified Kitchen',
            'created_at' => '2024-11-20 04:20:10',
            'updated_at' => '2024-11-20 04:20:10',
        ]);
        DB::table('halal_assurances')->insert([
            'id' => 8,
            'name' => 'halal-certified-restaurant',
            'display_name' => 'Halal Certified Venue',
            'created_at' => '2024-11-20 04:20:11',
            'updated_at' => '2024-11-20 04:20:11',
        ]);
    }
}
