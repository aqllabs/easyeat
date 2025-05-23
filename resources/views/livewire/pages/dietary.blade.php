<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.home')]
class extends Component {
    public function getDietaryCounts()
    {
        return DB::table('venues')
            ->join('diet_category_venue', 'venues.id', '=', 'diet_category_venue.venue_id')
            ->join('diet_categories', 'diet_category_venue.diet_category_id', '=', 'diet_categories.id')
            ->select('diet_categories.name', 'diet_categories.image', DB::raw('count(DISTINCT venues.id) as count'))
            ->groupBy('diet_categories.id', 'diet_categories.name', 'diet_categories.image')
            ->orderByDesc('count')
            ->get()
            ->map(function($item) {
                return [
                    'name' => $item->name,
                    'count' => $item->count . '+',
                    'image' => $item->image,
                ];
            });
    }

    public function with()
    {
        return [
            'dietary_counts' => cache()->remember('dietary_counts', now()->addHour(), fn() => $this->getDietaryCounts()),
        ];
    }
}; ?>

<div class="mt-8">
    <section class="mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl text-gray-600">Explore Dietary Options</h2>
            <a href="{{ route('places.index', ['filter' => 'diet']) }}" class="text-orange-500 hover:text-orange-600 font-medium">
                See More →
            </a>
        </div>
        <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($dietary_counts as $dietary)
                <div class="card relative h-36 md:h-48 w-full overflow-hidden">
                    <a href="{{ route('places.index', ['diet' => $dietary['name']]) }}">
                        @if($dietary['image'])
                            <img loading="lazy" src="{{ Storage::disk("s3")->url($dietary['image']) }}" 
                                 alt="{{ $dietary['name'] }}" 
                                 class="absolute inset-0 w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-gradient-to-br from-green-400/60 to-green-500/60 hover:from-green-500/70 hover:to-green-600/70 transition-colors">
                            <span class="text-2xl font-bold mb-1 pointer-events-none">{{ $dietary['count'] }}</span>
                            <span class="font-semibold text-center px-2 pointer-events-none">{{ $dietary['name'] }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</div> 