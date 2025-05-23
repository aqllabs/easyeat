<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    public function run(): void
    {
        $productTypes = [
            ['name' => 'sweets', 'display_name' => 'Sweets'],
            ['name' => 'bakery', 'display_name' => 'Bakery'],
            ['name' => 'meat', 'display_name' => 'Meat'],
            ['name' => 'organic', 'display_name' => 'Organic'],
            ['name' => 'healthy', 'display_name' => 'Healthy'],
        ];

        foreach ($productTypes as $type) {
            ProductType::updateOrCreate(
                ['name' => $type['name']],
                $type
            );
        }
    }
} 