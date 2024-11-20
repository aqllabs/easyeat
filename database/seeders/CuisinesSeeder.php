<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuisinesSeeder extends Seeder
{
    public function run()
    {
        DB::table('cuisines')->insert([
            'id' => 1,
            'name' => 'turkish',
            'display_name' => 'Turkish',
            'created_at' => '2024-11-20 04:20:10',
            'updated_at' => '2024-11-20 04:20:10',
        ]);
        DB::table('cuisines')->insert([
            'id' => 2,
            'name' => 'mediterranean',
            'display_name' => 'Mediterranean',
            'created_at' => '2024-11-20 04:20:10',
            'updated_at' => '2024-11-20 04:20:10',
        ]);
        DB::table('cuisines')->insert([
            'id' => 3,
            'name' => 'lebanese',
            'display_name' => 'Lebanese',
            'created_at' => '2024-11-20 04:20:10',
            'updated_at' => '2024-11-20 04:20:10',
        ]);
        DB::table('cuisines')->insert([
            'id' => 4,
            'name' => 'chinese',
            'display_name' => 'Chinese',
            'created_at' => '2024-11-20 04:20:10',
            'updated_at' => '2024-11-20 04:20:10',
        ]);
        DB::table('cuisines')->insert([
            'id' => 5,
            'name' => 'thai',
            'display_name' => 'Thai',
            'created_at' => '2024-11-20 04:20:10',
            'updated_at' => '2024-11-20 04:20:10',
        ]);
        DB::table('cuisines')->insert([
            'id' => 6,
            'name' => 'indian',
            'display_name' => 'Indian',
            'created_at' => '2024-11-20 04:20:10',
            'updated_at' => '2024-11-20 04:20:10',
        ]);
        DB::table('cuisines')->insert([
            'id' => 7,
            'name' => 'international',
            'display_name' => 'International',
            'created_at' => '2024-11-20 04:20:10',
            'updated_at' => '2024-11-20 04:20:10',
        ]);
        DB::table('cuisines')->insert([
            'id' => 8,
            'name' => 'middle-eastern',
            'display_name' => 'Middle-eastern',
            'created_at' => '2024-11-20 04:20:11',
            'updated_at' => '2024-11-20 04:20:11',
        ]);
        DB::table('cuisines')->insert([
            'id' => 9,
            'name' => 'pakistani',
            'display_name' => 'Pakistani',
            'created_at' => '2024-11-20 04:20:11',
            'updated_at' => '2024-11-20 04:20:11',
        ]);
        DB::table('cuisines')->insert([
            'id' => 10,
            'name' => 'nepalese',
            'display_name' => 'Nepalese',
            'created_at' => '2024-11-20 04:20:11',
            'updated_at' => '2024-11-20 04:20:11',
        ]);
        DB::table('cuisines')->insert([
            'id' => 11,
            'name' => 'south-indian',
            'display_name' => 'South-indian',
            'created_at' => '2024-11-20 04:20:12',
            'updated_at' => '2024-11-20 04:20:12',
        ]);
        DB::table('cuisines')->insert([
            'id' => 12,
            'name' => 'portuguese',
            'display_name' => 'Portuguese',
            'created_at' => '2024-11-20 04:20:13',
            'updated_at' => '2024-11-20 04:20:13',
        ]);
        DB::table('cuisines')->insert([
            'id' => 13,
            'name' => 'singaporean',
            'display_name' => 'Singaporean',
            'created_at' => '2024-11-20 04:20:13',
            'updated_at' => '2024-11-20 04:20:13',
        ]);
        DB::table('cuisines')->insert([
            'id' => 14,
            'name' => 'southeast-asian',
            'display_name' => 'Southeast-asian',
            'created_at' => '2024-11-20 04:20:13',
            'updated_at' => '2024-11-20 04:20:13',
        ]);
        DB::table('cuisines')->insert([
            'id' => 15,
            'name' => 'italian',
            'display_name' => 'Italian',
            'created_at' => '2024-11-20 04:20:13',
            'updated_at' => '2024-11-20 04:20:13',
        ]);
        DB::table('cuisines')->insert([
            'id' => 16,
            'name' => 'fast-food',
            'display_name' => 'Fast-food',
            'created_at' => '2024-11-20 04:20:16',
            'updated_at' => '2024-11-20 04:20:16',
        ]);
        DB::table('cuisines')->insert([
            'id' => 17,
            'name' => 'korean',
            'display_name' => 'Korean',
            'created_at' => '2024-11-20 04:20:17',
            'updated_at' => '2024-11-20 04:20:17',
        ]);
        DB::table('cuisines')->insert([
            'id' => 18,
            'name' => 'western',
            'display_name' => 'Western',
            'created_at' => '2024-11-20 04:20:20',
            'updated_at' => '2024-11-20 04:20:20',
        ]);
        DB::table('cuisines')->insert([
            'id' => 19,
            'name' => 'indonesian',
            'display_name' => 'Indonesian',
            'created_at' => '2024-11-20 04:20:21',
            'updated_at' => '2024-11-20 04:20:21',
        ]);
        DB::table('cuisines')->insert([
            'id' => 20,
            'name' => 'tibetan',
            'display_name' => 'Tibetan',
            'created_at' => '2024-11-20 04:20:23',
            'updated_at' => '2024-11-20 04:20:23',
        ]);
        DB::table('cuisines')->insert([
            'id' => 21,
            'name' => 'persian',
            'display_name' => 'Persian',
            'created_at' => '2024-11-20 04:20:23',
            'updated_at' => '2024-11-20 04:20:23',
        ]);
    }
}
