<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PriceRange;

class PriceRangeSeeder extends Seeder
{
    public function run(): void
    {
        $ranges = [
            [
                'name' => 'inexpensive',
                'symbol' => '$',
                'min_price' => 0,
                'max_price' => 30,
                'display_name' => 'Under $30'
            ],
            [
                'name' => 'moderate',
                'symbol' => '$$',
                'min_price' => 30,
                'max_price' => 60,
                'display_name' => '$30-$60'
            ],
            [
                'name' => 'expensive',
                'symbol' => '$$$',
                'min_price' => 60,
                'max_price' => 100,
                'display_name' => '$60-$100'
            ],
            [
                'name' => 'very_expensive',
                'symbol' => '$$$$',
                'min_price' => 100,
                'max_price' => 100000,
                'display_name' => '$100+'
            ],
        ];

        foreach ($ranges as $range) {
            PriceRange::create($range);
        }
    }
}
