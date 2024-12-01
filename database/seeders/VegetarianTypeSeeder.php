<?php

namespace Database\Seeders;

use App\Models\VegetarianType;
use Illuminate\Database\Seeder;

class VegetarianTypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            [
                'name' => 'pure_vegetarian',
                'display_name' => 'Pure Vegetarian',
            ],
            [
                'name' => 'vegetarian_options',
                'display_name' => 'Vegetarian Options Available',
            ],
            [
                'name' => 'not_vegetarian',
                'display_name' => 'Not Vegetarian',
            ],
        ];

        foreach ($types as $type) {
            VegetarianType::updateOrCreate(
                ['name' => $type['name']],
                $type
            );
        }
    }
}
