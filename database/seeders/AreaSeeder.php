<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            'Aberdeen',
            'Ap Lei Chau',
            'Causeway Bay',
            'Central',
            'Clear Water Bay',
            'Hung Hom',
            'Jordan',
            'Kai Tak',
            'Kennedy Town',
            'Kowloon Bay',
            'Kowloon City',
            'Kowloon Tong',
            'Kwai Chung',
            'Kwun Tong',
            'Lantau Island',
            'Ma On Shan',
            'Mong Kok',
            'North Point',
            'Ping Shan',
            'Pok Fu Lam',
            'Quarry Bay',
            'Sai Kung',
            'Sai Ying Pun',
            'Sha Tin',
            'Sham Shui Po',
            'Sheung Wan',
            'So Kon Po',
            'Stanley',
            'Tai Kok Tsui',
            'Tin Hau',
            'Tin Shui Wai',
            'To Kwa Wan',
            'Tseung Kwan O',
            'Tsim Sha Tsui',
            'Tsing Yi',
            'Tsuen Wan',
            'Tuen Mun',
            'Tung Chung',
            'Wan Chai',
            'Wong Tai Sin',
            'Yau Ma Tei',
            'Yuen Long'
        ];

        foreach ($areas as $area) {
            Area::create(['name' => $area, 'display_name' => $area]);
        }
    }
}
