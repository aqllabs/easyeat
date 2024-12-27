<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.home')]
class extends Component {
    public function getVenueTypeCounts()
    {
        return DB::table('venues')
            ->join('venue_type_venue', 'venues.id', '=', 'venue_type_venue.venue_id')
            ->join('venue_types', 'venue_type_venue.venue_type_id', '=', 'venue_types.id')
            ->select('venue_types.name', DB::raw('count(DISTINCT venues.id) as count'))
            ->groupBy('venue_types.id', 'venue_types.name')
            ->orderByDesc('count')
            ->get()
            ->map(function($item) {
                return [
                    'name' => $item->name,
                    'count' => $item->count . '+',
                ];
            });
    }

    public function with()
    {
        return [
            'venue_type_counts' => cache()->remember('venue_type_counts', now()->addHour(), fn() => $this->getVenueTypeCounts()),
        ];
    }
}; ?>

<div class="mt-8">
    <section class="mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl text-gray-600">Explore Venue Types</h2>
            <a href="{{ route('places.index', ['filter' => 'venue_type']) }}" class="text-orange-500 hover:text-orange-600 font-medium">
                See More →
            </a>
        </div>
        <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($venue_type_counts as $type)
                <div class="card relative h-36 md:h-48 w-full overflow-hidden">
                    <a href="{{ route('places.index', ['venue_type' => $type['name']]) }}">
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-gradient-to-br from-purple-400/60 to-purple-500/60 hover:from-purple-500/70 hover:to-purple-600/70 transition-colors">
                            <span class="text-2xl font-bold mb-1 pointer-events-none">{{ $type['count'] }}</span>
                            <span class="font-semibold text-center px-2 pointer-events-none">{{ $type['name'] }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</div> 