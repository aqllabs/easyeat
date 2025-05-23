<?php

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.home')]
class extends Component
{
    public function getCuisineCounts()
    {
        return DB::table('venues')
            ->join('cuisine_venue', 'venues.id', '=', 'cuisine_venue.venue_id')
            ->join('cuisines', 'cuisine_venue.cuisine_id', '=', 'cuisines.id')
            ->select('cuisines.display_name', 'cuisines.image', DB::raw('count(DISTINCT venues.id) as count'))
            ->groupBy('cuisines.id', 'cuisines.display_name', 'cuisines.image')
            ->orderByDesc('count')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->display_name,
                    'count' => $item->count.'+',
                    'image' => $item->image,
                ];
            });
    }

    public function with()
    {
        return [
            'cuisine_counts' => cache()->remember('cuisine_counts', now()->addHour(), fn () => $this->getCuisineCounts()),
        ];
    }
}; ?>


<div class="mt-8">
    <section class="mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl text-gray-600">Explore Cuisines</h2>
            <a href="{{ route("places.index", ["filter" => "cuisines"]) }}" class="text-orange-500 hover:text-orange-600 font-medium">See More →</a>
        </div>
        <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($cuisine_counts as $cuisine)
                <div class="card relative h-36 md:h-48 w-full overflow-hidden">
                    <a href="{{ route("places.index", ["cuisines" => $cuisine["name"]]) }}">
                        @if ($cuisine["image"])
                            <img
                                loading="lazy"
                                src="{{ Storage::disk("s3")->url($cuisine["image"]) }}"
                                alt="{{ $cuisine["name"] }}"
                                class="absolute inset-0 w-full h-full object-cover"
                            />
                        @endif

                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center text-white bg-gradient-to-br from-orange-400/60 to-orange-500/60 hover:from-orange-500/70 hover:to-orange-600/70 transition-colors"
                        >
                            <span class="text-2xl font-bold mb-1 pointer-events-none">{{ $cuisine["count"] }}</span>
                            <span class="font-semibold text-center px-2 pointer-events-none">{{ $cuisine["name"] }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</div>
