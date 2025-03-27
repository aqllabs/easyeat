<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodType;

class FoodTypeSeeder extends Seeder
{
    public function run(): void
    {
        $foodTypes = [
            ['name' => 'dimsum', 'display_name' => 'Dimsums'],
            ['name' => 'noodles', 'display_name' => 'Noodles'],
            ['name' => 'hotpot', 'display_name' => 'Hotpot'],
            ['name' => 'curry', 'display_name' => 'Curry'],
            ['name' => 'desserts', 'display_name' => 'Desserts'],
            ['name' => 'buffet', 'display_name' => 'Buffet'],
            ['name' => 'healthy', 'display_name' => 'Healthy'],
            ['name' => 'grilled', 'display_name' => 'Grilled'],
            ['name' => 'bbq', 'display_name' => 'BBQ'],
            ['name' => 'seafood', 'display_name' => 'Seafood'],
            ['name' => 'pizza', 'display_name' => 'Pizza'],
            ['name' => 'burgers', 'display_name' => 'Burgers'],
            ['name' => 'fine_dining', 'display_name' => 'Fine Dining'],
            ['name' => 'steakhouse', 'display_name' => 'Steakhouse'],
            ['name' => 'breakfast', 'display_name' => 'Breakfast'],
            ['name' => 'pet_friendly', 'display_name' => 'Pet Friendly'],
            ['name' => 'kebabs', 'display_name' => 'Kebabs'],
            ['name' => 'bubble_tea', 'display_name' => 'Bubble Tea/Boba'],
        ];

        foreach ($foodTypes as $type) {
            FoodType::create($type);
        }
    }
}
