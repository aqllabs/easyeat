<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HalalAssurance;

class HalalAssuranceSeeder extends Seeder
{
    public function run(): void
    {
        $assurances = [
            [
                'name' => 'halal_certified_restaurant',
                'display_name' => 'Halal Certified Venue'
            ],
            [
                'name' => 'halal_certified_kitchen',
                'display_name' => 'Halal Certified Kitchen'
            ],
            [
                'name' => 'muslim_owned_restaurant',
                'display_name' => 'Muslim-Owned Venue'
            ],
            [
                'name' => 'certified_muslim_friendly',
                'display_name' => 'Certified Muslim-Friendly Venue'
            ],
        ];

        foreach ($assurances as $assurance) {
            HalalAssurance::create($assurance);
        }
    }
}
