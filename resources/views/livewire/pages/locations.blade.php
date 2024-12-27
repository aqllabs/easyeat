<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.home')]
class extends Component {
    public function getLocationCounts()
    {
        return DB::table('venues')
            ->select('location', DB::raw('count(*) as count'))
            ->whereNotNull('location')
            ->groupBy('location')
            ->orderByDesc('count')
            ->get()
            ->map(function($item) {
                return [
                    'name' => $item->location,
                    'count' => $item->count . '+',
                ];
            });
    }

    public function with()
    {
        return [
            'location_counts' => cache()->remember('location_counts', now()->addHour(), fn() => $this->getLocationCounts()),
        ];
    }
}; ?>

<div class="mt-8">
    <section class="mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl text-gray-600">Explore Locations</h2>
            <a href="{{ route('places.index', ['filter' => 'area']) }}" class="text-orange-500 hover:text-orange-600 font-medium">
                See More →
            </a>
        </div>
        <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($location_counts as $location)
                <div class="card relative h-36 md:h-48 w-full overflow-hidden">
                    <a href="{{ route('places.index', ['location' => $location['name']]) }}">
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-gradient-to-br from-blue-400/60 to-blue-500/60 hover:from-blue-500/70 hover:to-blue-600/70 transition-colors">
                            <span class="text-2xl font-bold mb-1 pointer-events-none">{{ $location['count'] }}</span>
                            <span class="font-semibold text-center px-2 pointer-events-none">{{ $location['name'] }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</div> 