<?php

namespace App\Livewire\Pages;

use App\Models\Venue;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;

use Ijpatricio\Mingle\Concerns\InteractsWithMingles;
use App\Models\DietCategory;
use App\Models\HalalAssurance;
use App\Models\VenueType;
use App\Models\Cuisine;
use App\Models\PriceRange;
use App\Models\Area;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
new #[Layout('layouts.home')]
class extends Component 
{
    public $searchQuery = '';

    public function search()
    {
        return redirect()->route('places.index', ['search' => $this->searchQuery]);
    }

    public function getUnsplashImage($query)
    {
        return cache()->remember('unsplash_image_' . $query, 86400, function() use ($query) {
            try {
                $response = Http::get('https://api.unsplash.com/photos/random', [
                    'client_id' => config('services.unsplash.access_key'),
                    'query' => $query,
                    'orientation' => 'landscape',
                ]);            
                if ($response->successful()) {
                    return $response->json()['urls']['regular'];
                }
            } catch (\Exception $e) {
                // Fallback gradient if API fails
                return null;
            }
            return null;
        });
    }
    public function getDietaryCounts()
    {
        return DB::table('venues')
            ->join('diet_category_venue', 'venues.id', '=', 'diet_category_venue.venue_id')
            ->join('diet_categories', 'diet_category_venue.diet_category_id', '=', 'diet_categories.id')
            ->select('diet_categories.display_name', DB::raw('count(DISTINCT venues.id) as count'))
            ->groupBy('diet_categories.id', 'diet_categories.display_name')
            ->orderByDesc('count')
            ->get()
            ->map(function($item) {
                return [
                    'name' => $item->display_name,
                    'count' => $item->count . '+',
                    'image' => $this->getUnsplashImage($item->display_name . ' food')
                ];
            });
    }

    public function getLocationCounts()
    {
        return DB::table('venues')
            ->join('areas', 'venues.area_id', '=', 'areas.id')
            ->select('areas.display_name', DB::raw('count(venues.id) as count'))
            ->whereNotNull('venues.area_id')
            ->groupBy('areas.id', 'areas.display_name')
            ->orderByDesc('count')
            ->limit(4)
            ->get()
            ->map(function($item) {
                return [
                    'name' => $item->display_name,
                    'count' => $item->count . '+',
                    'image' => $this->getUnsplashImage($item->display_name . ' location')

                ];
            });
    }

    public function getCuisineCounts()
    {
        return DB::table('venues')
            ->join('cuisine_venue', 'venues.id', '=', 'cuisine_venue.venue_id')
            ->join('cuisines', 'cuisine_venue.cuisine_id', '=', 'cuisines.id')
            ->select('cuisines.display_name', DB::raw('count(DISTINCT venues.id) as count'))
            ->groupBy('cuisines.id', 'cuisines.display_name')
            ->orderByDesc('count')
            ->limit(4)
            ->get()
            ->map(function($item) {
                return [
                    'name' => $item->display_name,
                    'count' => $item->count . '+',
                    'image' => $this->getUnsplashImage($item->display_name . ' food')
                ];
            });
    }

    public function with()
    {
        return [
            'dietary_counts' => cache()->remember('dietary_counts', now()->addHour(), fn() => $this->getDietaryCounts()),
            'location_counts' => cache()->remember('location_counts', now()->addHour(), fn() => $this->getLocationCounts()),
            'cuisine_counts' => cache()->remember('cuisine_counts', now()->addHour(), fn() => $this->getCuisineCounts()),
        ];
    }
}
?>



  <div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Hero Section -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-8 mb-16">
            <div class="max-w-xl">
                <h1 class="text-4xl font-bold mb-4">
                    Discover Nearby Restaurants
                    <span class="block">Suited To Your <span class="text-orange-500">Dietary Needs</span></span>
                </h1>
                
                <!-- Search Bar -->
                <form wire:submit="search">
                    <div class="join w-full">
                        <input 
                        wire:model="searchQuery"
                        type="text" 
                        placeholder="Search by Restaurant, Dietary Needs, Cuisine, Location" 
                        class="join-item input input-bordered w-full"
                    >
                        <button  class="join-item btn btn-neutral">Search Now</button>
                    </div>
                </form>
            </div>
            
            <div class="hidden md:block">
                <div class="w-96 h-64 rounded-lg overflow-hidden">
                    <img src="{{ asset('/images/food-collage.jpeg') }}" alt="Food Collage" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Dietary Requirements Section -->
        <section class="mb-16">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl text-gray-600">Search by Dietary Requirement</h2>
                <a href="{{ route('places.index', ['filter' => 'dietary']) }}" class="text-orange-500 hover:text-orange-600 font-medium">
                    See More →
                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($dietary_counts as $diet)
                    <a href="{{ route('places.index', ['diet' => $diet['name']]) }}" 
                       class="card relative h-48 overflow-hidden">
                        @if($diet['image'])
                            <img src="{{ $diet['image'] }}" alt="{{ $diet['name'] }}" class="absolute inset-0 w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-gradient-to-br from-orange-400/60 to-orange-500/60 hover:from-orange-500/70 hover:to-orange-600/70 transition-colors">
                            <span class="text-2xl font-bold mb-1">{{ $diet['count'] }}</span>
                            <span class="font-semibold text-center px-2">{{ $diet['name'] }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Locations Section -->
        <section class="mb-16">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl text-gray-600">Search by Location</h2>
                <a href="{{ route('places.index', ['filter' => 'location']) }}" class="text-orange-500 hover:text-orange-600 font-medium">
                    See More →
                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($location_counts as $location)
                    <a href="{{ route('places.index', ['area' => $location['name']]) }}" 
                       class="card relative h-48 overflow-hidden">
                        @if($location['image'])
                            <img src="{{ $location['image'] }}" alt="{{ $location['name'] }}" class="absolute inset-0 w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-gradient-to-br from-orange-400/60 to-orange-500/60 hover:from-orange-500/70 hover:to-orange-600/70 transition-colors">
                            <span class="text-2xl font-bold mb-1">{{ $location['count'] }}</span>
                            <span class="font-semibold text-center px-2">{{ $location['name'] }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Cuisines Section -->
        <section class="mb-16">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl text-gray-600">Search by Cuisine</h2>
                <a href="{{ route('places.index', ['filter' => 'cuisine']) }}" class="text-orange-500 hover:text-orange-600 font-medium">
                    See More →
                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($cuisine_counts as $cuisine)
                    <a href="{{ route('places.index', ['cuisine' => $cuisine['name']]) }}" 
                       class="card relative h-48 overflow-hidden">
                        @if($cuisine['image'])
                            <img src="{{ $cuisine['image'] }}" alt="{{ $cuisine['name'] }}" class="absolute inset-0 w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-gradient-to-br from-orange-400/60 to-orange-500/60 hover:from-orange-500/70 hover:to-orange-600/70 transition-colors">
                            <span class="text-2xl font-bold mb-1">{{ $cuisine['count'] }}</span>
                            <span class="font-semibold text-center px-2">{{ $cuisine['name'] }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
</div>