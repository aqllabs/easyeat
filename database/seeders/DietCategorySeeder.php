<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DietCategory;

class DietCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'halal', 'display_name' => 'Halal'],
            ['name' => 'vegetarian', 'display_name' => 'Vegetarian'],
            ['name' => 'vegan', 'display_name' => 'Vegan'],
            ['name' => 'jain', 'display_name' => 'Jain'],
            ['name' => 'kosher', 'display_name' => 'Kosher']

        ];

        foreach ($categories as $category) {
            DietCategory::create($category);
        }
    }
}
