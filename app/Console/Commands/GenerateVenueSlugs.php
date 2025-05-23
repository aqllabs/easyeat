<?php

namespace App\Console\Commands;

use App\Models\Venue;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateVenueSlugs extends Command
{
    protected $signature = 'venues:generate-slugs';
    protected $description = 'Generate slugs for all venues';

    public function handle()
    {
        $venues = Venue::whereNull('slug')->get();
        $count = 0;

        foreach ($venues as $venue) {
            $baseSlug = Str::slug($venue->name);
            $slug = $baseSlug;
            $counter = 1;

            while (Venue::where('slug', $slug)->where('id', '!=', $venue->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $venue->slug = $slug;
            $venue->save();
            $count++;
        }

        $this->info("Generated slugs for {$count} venues.");
    }
} 