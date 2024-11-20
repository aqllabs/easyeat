<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class price_rangesSeeder extends Seeder
{
    public function run()
    {
        DB::table('price_ranges')->insert([
            'id' => 1,
            'name' => 'inexpensive',
            'symbol' => '$',
            'min_price' => 0,
            'max_price' => 30,
            'display_name' => 'Under $30',
            'created_at' => '2024-11-20 04:20:09',
            'updated_at' => '2024-11-20 04:20:09',
        ]);
        DB::table('price_ranges')->insert([
            'id' => 2,
            'name' => 'moderate',
            'symbol' => '$$',
            'min_price' => 30,
            'max_price' => 60,
            'display_name' => '$30-$60',
            'created_at' => '2024-11-20 04:20:09',
            'updated_at' => '2024-11-20 04:20:09',
        ]);
        DB::table('price_ranges')->insert([
            'id' => 3,
            'name' => 'expensive',
            'symbol' => '$$$',
            'min_price' => 60,
            'max_price' => 100,
            'display_name' => '$60-$100',
            'created_at' => '2024-11-20 04:20:09',
            'updated_at' => '2024-11-20 04:20:09',
        ]);
        DB::table('price_ranges')->insert([
            'id' => 4,
            'name' => 'very_expensive',
            'symbol' => '$$$$',
            'min_price' => 100,
            'max_price' => 100000,
            'display_name' => '$100+',
            'created_at' => '2024-11-20 04:20:09',
            'updated_at' => '2024-11-20 04:20:09',
        ]);
    }
}
