<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sessionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('sessions')->insert([
            'id' => '8j1NpJPX9tyKX9wNf7WGYfSXE3XF583NZLWC3Z89',
            'user_id' => null,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
            'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmZ5UVNud0VYUjFYNXVZcVhoSnQ4RFVLNmkyalZJYVpOVUp0SFIxMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9lYXN5LWVhdC50ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',
            'last_activity' => 1732085083,
        ]);
        DB::table('sessions')->insert([
            'id' => 's9NGnR0ug0L5m4sdL7oLxZeUy6k8qWhS3j5WwqAI',
            'user_id' => null,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
            'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWFNQkViR1pJbWxGNWZHa0xaWHFLYVdqVUdJRmoxejI3eTBZS2xJaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9lYXN5LWVhdC50ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',
            'last_activity' => 1732086583,
        ]);
    }
}
