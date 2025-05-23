<?php

namespace Database\Seeders;

use App\Models\DietaryRequirement;
use Illuminate\Database\Seeder;

class DietaryRequirementSeeder extends Seeder
{
    public function run(): void
    {
        $dietaryRequirements = [
            ['name' => 'halal', 'display_name' => 'Halal'],
            ['name' => 'vegetarian', 'display_name' => 'Vegetarian'],
            ['name' => 'vegan', 'display_name' => 'Vegan'],
            ['name' => 'jain', 'display_name' => 'Jain'],
            ['name' => 'gluten_free', 'display_name' => 'Gluten-free'],
        ];

        foreach ($dietaryRequirements as $requirement) {
            DietaryRequirement::updateOrCreate(
                ['name' => $requirement['name']],
                $requirement
            );
        }
    }
} 