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
        //image
            ->join('diet_category_venue', 'venues.id', '=', 'diet_category_venue.venue_id')
            ->join('diet_categories', 'diet_category_venue.diet_category_id', '=', 'diet_categories.id')
            ->select('diet_categories.display_name', 'diet_categories.image', DB::raw('count(DISTINCT venues.id) as count'))
            ->groupBy('diet_categories.id', 'diet_categories.display_name', 'diet_categories.image')
            ->orderByDesc('count')
            ->get()
            ->map(function($item) {
                return [
                    'name' => $item->display_name,
                    'count' => $item->count . '+',
                    'image' => $item->image
                ];
            });
    }

    public function getLocationCounts()
    {
        return DB::table('venues')
            ->join('areas', 'venues.area_id', '=', 'areas.id')
            ->select('areas.display_name', 'areas.image', DB::raw('count(venues.id) as count'))
            ->whereNotNull('venues.area_id')
            ->groupBy('areas.id', 'areas.display_name', 'areas.image')
            ->orderByDesc('count')
            ->get()
            ->map(function($item) {
                return [
                    'name' => $item->display_name,
                    'count' => $item->count . '+',
                    'image' => $item->image,
                ];
            });
    }

    public function getCuisineCounts()
    {
        return DB::table('venues')
            ->join('cuisine_venue', 'venues.id', '=', 'cuisine_venue.venue_id')
            ->join('cuisines', 'cuisine_venue.cuisine_id', '=', 'cuisines.id')
            ->select('cuisines.display_name', 'cuisines.image', DB::raw('count(DISTINCT venues.id) as count'))
            ->groupBy('cuisines.id', 'cuisines.display_name', 'cuisines.image')
            ->orderByDesc('count')
            ->get()
            ->map(function($item) {
                return [
                    'name' => $item->display_name,
                    'count' => $item->count . '+',
                    'image' => $item->image,
                ];
            });
    }

    public function getVenueTypeCounts()
    {
        return DB::table('venues')
            ->join('venue_types', 'venues.venue_type_id', '=', 'venue_types.id')
            ->select('venue_types.display_name', 'venue_types.image', DB::raw('count(venues.id) as count'))
            ->groupBy('venue_types.id', 'venue_types.display_name', 'venue_types.image')
            ->orderByDesc('count')
            ->get()
            ->map(function($item) {
                return [
                    'name' => $item->display_name,
                    'count' => $item->count . '+',
                    'image' => $item->image,
                ];
            });
    }

    public function with()
    {
        return [
            'dietary_counts' => cache()->remember('dietary_counts', now()->addHour(), fn() => $this->getDietaryCounts()),
            'location_counts' => cache()->remember('location_counts', now()->addHour(), fn() => $this->getLocationCounts()),
            'cuisine_counts' => cache()->remember('cuisine_counts', now()->addHour(), fn() => $this->getCuisineCounts()),
            'venue_type_counts' => cache()->remember('venue_type_counts', now()->addHour(), fn() => $this->getVenueTypeCounts()),
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
                        <img 
                            src="{{ asset('/images/food-collage.jpeg') }}" 
                            alt="Food Collage" 
                            class="w-full h-full object-cover"
                            width="384"
                            height="256"
                            loading="lazy"
                            decoding="async"
                        >
                </div>
            </div>
        </div>

        <!-- Dietary Requirements Section -->
        <section class="mb-16">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl text-gray-600">Search by Dietary Needs</h2>
                <a href="{{ route('places.index', ['filter' => 'dietary']) }}" class="text-orange-500 hover:text-orange-600 font-medium">
                    See More →
                </a>
            </div>
            <div class="carousel w-full relative">
                <div class="carousel carousel-center w-full p-4 space-x-4 rounded-box">
                    @foreach ($dietary_counts as $diet)
                        <div id="dietary-{{ $loop->index }}" class="carousel-item w-72">
                            <a href="{{ route('places.index', ['diet' => $diet['name']]) }}" 
                               class="card relative h-48 w-full overflow-hidden">
                                @if($diet['image'])
                                    <img loading="lazy" src="{{ Storage::disk("s3")->url($diet['image']) }}" alt="{{ $diet['name'] }}" class="absolute inset-0 w-full h-full object-cover">
                                @endif
                                <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-gradient-to-br from-orange-400/60 to-orange-500/60 hover:from-orange-500/70 hover:to-orange-600/70 transition-colors">
                                    <span class="text-2xl font-bold mb-1">{{ $diet['count'] }}</span>
                                    <span class="font-semibold text-center px-2">{{ $diet['name'] }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="absolute left-5 pointer-events-none right-5 top-1/2 flex -translate-y-1/2 transform justify-between z-10">
                    <button class="btn btn-circle pointer-events-auto">❮</button>
                    <button class="btn btn-circle pointer-events-auto">❯</button>
                </div>
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
            <div class="carousel w-full relative">
                <div class="carousel carousel-center w-full p-4 space-x-4 rounded-box">
                    @foreach ($location_counts as $index => $location)
                        <div id="location-{{ $index }}" class="carousel-item w-72">
                            <a href="{{ route('places.index', ['area' => $location['name']]) }}" 
                               class="card relative h-48 w-full overflow-hidden">
                                @if($location['image'])
                                    <img loading="lazy" src="{{ Storage::disk("s3")->url($location['image']) }}" alt="{{ $location['name'] }}" class="absolute inset-0 w-full h-full object-cover">
                                @endif
                                <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-gradient-to-br from-orange-400/60 to-orange-500/60 hover:from-orange-500/70 hover:to-orange-600/70 transition-colors">
                                    <span class="text-2xl font-bold mb-1">{{ $location['count'] }}</span>
                                    <span class="font-semibold text-center px-2">{{ $location['name'] }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="absolute left-5 pointer-events-none right-5 top-1/2 flex -translate-y-1/2 transform justify-between z-10">
                    <button class="btn btn-circle pointer-events-auto">❮</button>
                    <button class="btn btn-circle pointer-events-auto">❯</button>
                </div>
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
            <div class="carousel w-full relative">
                <div class="carousel carousel-center w-full p-4 space-x-4 rounded-box">
                    @foreach ($cuisine_counts as $index => $cuisine)
                        <div id="cuisine-{{ $index }}" class="carousel-item w-72">
                            <a href="{{ route('places.index', ['cuisines' => $cuisine['name']]) }}" 
                               class="card relative h-48 w-full overflow-hidden">
                                @if($cuisine['image'])
                                    <img loading="lazy" src="{{ Storage::disk("s3")->url($cuisine['image']) }}" 
                                         alt="{{ $cuisine['name'] }}" 
                                         class="absolute inset-0 w-full h-full object-cover">
                                @endif
                                <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-gradient-to-br from-orange-400/60 to-orange-500/60 hover:from-orange-500/70 hover:to-orange-600/70 transition-colors">
                                    <span class="text-2xl font-bold mb-1 pointer-events-none">{{ $cuisine['count'] }}</span>
                                    <span class="font-semibold text-center px-2 pointer-events-none">{{ $cuisine['name'] }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="absolute left-5 pointer-events-none right-5 top-1/2 flex -translate-y-1/2 transform justify-between z-10">
                    <button class="btn btn-circle pointer-events-auto">❮</button>
                    <button class="btn btn-circle pointer-events-auto">❯</button>
                </div>
            </div>
        </section>

        <!-- Venue Types Section -->
        <section class="mb-16">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl text-gray-600">Search by Venue Type</h2>
                <a href="{{ route('places.index', ['filter' => 'venue_type']) }}" class="text-orange-500 hover:text-orange-600 font-medium">
                    See More →
                </a>
            </div>
            <div class="carousel w-full relative">
                <div class="carousel carousel-center w-full p-4 space-x-4 rounded-box">
                    @foreach ($venue_type_counts as $index => $venue_type)
                        <div id="venue-type-{{ $index }}" class="carousel-item w-72">
                            <a href="{{ route('places.index', ['venue' => $venue_type['name']]) }}" 
                               class="card relative h-48 w-full overflow-hidden">
                                @if($venue_type['image'])
                                    <img loading="lazy" src="{{ Storage::disk("s3")->url($venue_type['image']) }}" alt="{{ $venue_type['name'] }}" class="absolute inset-0 w-full h-full object-cover">
                                @endif
                                <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-gradient-to-br from-orange-400/60 to-orange-500/60 hover:from-orange-500/70 hover:to-orange-600/70 transition-colors">
                                    <span class="text-2xl font-bold mb-1">{{ $venue_type['count'] }}</span>
                                    <span class="font-semibold text-center px-2">{{ $venue_type['name'] }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="absolute left-5 pointer-events-none right-5 top-1/2 flex -translate-y-1/2 transform justify-between z-10">
                    <button class="btn btn-circle pointer-events-auto">❮</button>
                    <button class="btn btn-circle pointer-events-auto">❯</button>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousels = document.querySelectorAll('.carousel');
        
        carousels.forEach(carousel => {
            const scrollContainer = carousel.querySelector('.carousel-center');
            const prevBtn = carousel.querySelector('.btn-circle:first-child');
            const nextBtn = carousel.querySelector('.btn-circle:last-child');
            
            if (!scrollContainer || !prevBtn || !nextBtn) return;
            
            prevBtn.addEventListener('click', () => {
                const itemWidth = scrollContainer.querySelector('.carousel-item').offsetWidth;
                scrollContainer.scrollBy({
                    left: -itemWidth,
                    behavior: 'smooth'
                });
            });
            
            nextBtn.addEventListener('click', () => {
                const itemWidth = scrollContainer.querySelector('.carousel-item').offsetWidth;
                scrollContainer.scrollBy({
                    left: itemWidth,
                    behavior: 'smooth'
                });
            });
        });
    });
</script>