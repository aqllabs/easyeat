<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        if (! User::exists()) {
            $this->call(UserSeeder::class);
        }

        User::all()->each(fn (User $user) => $user
            ->teams()
            ->save(
                Team::factory()->create(['user_id' => $user->getKey()]))
        );
    }
}
