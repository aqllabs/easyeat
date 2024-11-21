<?php

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
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

new #[Layout('layouts.home')]
class extends Component {
    use WithPagination;

    #[Url]
    public $filterValues = [
        'diet_categories' => [],
        'halal_assurance' => [],
        'venue_type' => [],
        'areas' => [],
        'cuisines' => [],
        'price_range' => [],
    ];

    #[Url]
    public $search = '';

    public $showFilters = false;

    public function toggleFilters()
    {
        $this->showFilters = !$this->showFilters;
    }

    public function updated($property)
    {
        if (str_starts_with($property, 'filterValues')) {
            $this->resetPage();
        }
    }

    protected function loadVenues()
    {
        $query = Venue::search($this->search)->query(fn (Builder $query) => $query->with('dietCategories:id,display_name', 'halalAssurance:id,display_name', 'venueType:id,display_name', 'cuisines:id,display_name', 'priceRange:id,display_name'));
;
        // Apply filters if they are set
        if (!empty($this->filterValues['diet_categories'])) {
            $query->whereIn('diet_categories', $this->filterValues['diet_categories']);
        }
        if (!empty($this->filterValues['halal_assurance'])) {
            $query->whereIn('halal_assurance', $this->filterValues['halal_assurance']);
        }
        if (!empty($this->filterValues['venue_type'])) {
            $query->whereIn('venue_type', $this->filterValues['venue_type']);
        }
        if (!empty($this->filterValues['areas'])) {
            $query->whereIn('area', $this->filterValues['areas']);
        }
        if (!empty($this->filterValues['cuisines'])) {
            $query->whereIn('cuisines', $this->filterValues['cuisines']);
        }
        if (!empty($this->filterValues['price_range'])) {
            $query->whereIn('price_range', $this->filterValues['price_range']);
        }

        return $query->paginate(15);
    }


    public function with()
    {
        return [
            'venues' => $this->loadVenues(),
            'diet_categories' => cache()->remember('diet_categories', now()->addHour(), fn() => DietCategory::all(['id', 'display_name'])),
            'halal_assurance' => cache()->remember('halal_assurance', now()->addHour(), fn() => HalalAssurance::all(['id', 'display_name'])),
            'venue_type' => cache()->remember('venue_type', now()->addHour(), fn() => VenueType::all(['id', 'display_name'])),
            'areas' => cache()->remember('areas', now()->addHour(), fn() => Area::orderBy('name')->get(['id', 'display_name'])),
            'cuisines' => cache()->remember('cuisines', now()->addHour(), fn() => Cuisine::all(['id', 'display_name'])),
            'price_range' => cache()->remember('price_range', now()->addHour(), fn() => PriceRange::all(['id', 'display_name'])),
        ];
    }
}; ?>


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Search Section -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
        <div class="w-full sm:max-w-xl">
            <input
                wire:model.live="search"
                type="text"
                placeholder="Halal Western"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary"
            >
        </div>
        <div class="flex gap-2">
            <flux:button href="{{route('map')}}" icon="map">View on Map</flux:button>
            <flux:button 
                wire:click="toggleFilters"
                class="sm:hidden"
            >
                Filters
            </flux:button>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-8">
        <!-- Filters Sidebar -->
        <div class="w-full sm:w-64 flex-shrink-0 {{ !$showFilters ? 'hidden sm:block' : '' }}">
            <h2 class="text-lg font-semibold mb-4">Filtered Search</h2>

            <!-- Dietary Preference -->
            <div class="mb-6">
                <flux:checkbox.group wire:model.live="filterValues.diet_categories" label="Dietary preference">
                    @foreach($diet_categories as $category)
                        <flux:checkbox
                            label="{{ $category->display_name }}"
                            value="{{ $category->display_name }}"
                        />
                    @endforeach
                </flux:checkbox.group>
            </div>

            <!-- Halal Assurance -->
            <div class="mb-6">
                <flux:checkbox.group wire:model.live="filterValues.halal_assurance" label="Halal Assurance">
                    @foreach($halal_assurance as $assurance)
                        <flux:checkbox
                            label="{{ $assurance->display_name }}"
                            value="{{ $assurance->display_name }}"
                        />
                    @endforeach
                </flux:checkbox.group>
            </div>

            <!-- Venue Type -->
            <div class="mb-6">
                <flux:checkbox.group wire:model.live="filterValues.venue_type" label="Venue Type">
                    @foreach($venue_type as $type)
                        <flux:checkbox
                            label="{{ $type->display_name }}"
                            value="{{ $type->display_name }}"
                        />
                    @endforeach
                </flux:checkbox.group>
            </div>

            <!-- Area -->
            <div class="mb-6">
                <flux:checkbox.group wire:model.live="filterValues.areas" label="Area">
                    @foreach($areas as $area)
                        <flux:checkbox
                            label="{{ $area->display_name }}"
                            value="{{ $area->display_name }}"
                        />
                    @endforeach
                </flux:checkbox.group>
            </div>

            <!-- Cuisines -->
            <div class="mb-6">
                <flux:checkbox.group wire:model.live="filterValues.cuisines" label="Cuisines">
                    @foreach($cuisines as $cuisine)
                        <flux:checkbox
                            label="{{ $cuisine->display_name }}"
                            value="{{ $cuisine->display_name }}"
                        />
                    @endforeach
                </flux:checkbox.group>
            </div>

            <!-- Price Range -->
            <div class="mb-6">
                <flux:checkbox.group wire:model.live="filterValues.price_range" label="Price Range">
                    @foreach($price_range as $range)
                        <flux:checkbox
                            label="{{ $range->display_name }}"
                            value="{{ $range->display_name }}"
                        />
                    @endforeach
                </flux:checkbox.group>
            </div>
        </div>

        <!-- Venue Cards -->
        <div class="flex-1">
            <div class="grid grid-cols-1 gap-6">
                @foreach($venues as $venue)
                    <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow sm:card-side">
                        <figure class="h-48 sm:h-56 sm:w-1/3">
                            <img
                                src="{{ $venue->thumbnail_url ? "https://discoverhongkong.com/".$venue->thumbnail_url : 'https://placehold.co/600x400' }}"
                                alt="{{ $venue->name }}"
                                class="w-full h-full object-cover"
                            >
                        </figure>
                        <div class="card-body sm:w-2/3">
                            <div class="flex justify-between items-start">
                                <a href="{{ route('places.show', $venue->id) }}" class="hover:text-primary transition-colors">
                                    <h3 class="card-title">{{ $venue->name }}</h3>
                                </a>
                            </div>

                            <div class="flex flex-wrap gap-2">
                                @if($venue->halalAssurance)
                                    <div class="badge badge-primary badge-outline">
                                        {{ $venue->halalAssurance->display_name }}
                                    </div>
                                @endif
                                @if($venue->dietCategories)
                                    @foreach($venue->dietCategories as $category)
                                        <div class="badge badge-secondary">
                                            {{ $category->display_name }}
                                        </div>
                                    @endforeach
                                @endif

                                @if($venue->cuisines)
                                    @foreach($venue->cuisines as $cuisine)
                                        <div class="badge badge-secondary badge-outline">
                                            {{ $cuisine->display_name }}
                                        </div>
                                    @endforeach
                                @endif

                                @if($venue->price_range)
                                    <div class="badge badge-accent badge-outline">
                                        {{ $venue->price_range->display_name }}
                                    </div>
                                @endif
                            </div>

                            @if($venue->address)
                                <div class="text-base-content/70 flex items-start gap-2">
                                    <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <p class="flex-1">{{ $venue->address }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">
                {{ $venues->links() }}
            </div>
        </div>
    </div>
</div>
