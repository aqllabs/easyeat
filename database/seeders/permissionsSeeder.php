<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class permissionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->insert([
            'id' => 1,
            'name' => 'add_article',
            'guard_name' => 'web',
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
        DB::table('permissions')->insert([
            'id' => 2,
            'name' => 'remove_article',
            'guard_name' => 'web',
            'created_at' => '2024-11-19 08:32:31',
            'updated_at' => '2024-11-19 08:32:31',
        ]);
    }
}
