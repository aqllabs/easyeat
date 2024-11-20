<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DietCategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('diet_categories')->insert([
            'id' => 1,
            'name' => 'halal',
            'display_name' => 'Halal',
            'created_at' => '2024-11-20 04:20:09',
            'updated_at' => '2024-11-20 04:20:09',
        ]);
        DB::table('diet_categories')->insert([
            'id' => 2,
            'name' => 'vegetarian',
            'display_name' => 'Vegetarian',
            'created_at' => '2024-11-20 04:20:09',
            'updated_at' => '2024-11-20 04:20:09',
        ]);
        DB::table('diet_categories')->insert([
            'id' => 3,
            'name' => 'vegan',
            'display_name' => 'Vegan',
            'created_at' => '2024-11-20 04:20:09',
            'updated_at' => '2024-11-20 04:20:09',
        ]);
        DB::table('diet_categories')->insert([
            'id' => 4,
            'name' => 'jain',
            'display_name' => 'Jain',
            'created_at' => '2024-11-20 04:20:09',
            'updated_at' => '2024-11-20 04:20:09',
        ]);
        DB::table('diet_categories')->insert([
            'id' => 5,
            'name' => 'kosher',
            'display_name' => 'Kosher',
            'created_at' => '2024-11-20 04:20:09',
            'updated_at' => '2024-11-20 04:20:09',
        ]);
    }
}
