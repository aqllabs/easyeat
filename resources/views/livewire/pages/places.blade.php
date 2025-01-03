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
use App\Models\VegetarianType;
use Illuminate\Support\Facades\Storage;
new #[Layout('layouts.home')]
class extends Component {
    use WithPagination;

    // Define URL parameters for all filter types
    #[Url(as: 'cuisines')]
    public $selectedCuisines = '';

    #[Url(as: 'diet')]
    public $selectedDiet = '';

    #[Url(as: 'area')]
    public $selectedArea = '';

    #[Url(as: 'halal')]
    public $selectedHalal = '';

    #[Url(as: 'venue')]
    public $selectedVenue = '';

    #[Url(as: 'price')]
    public $selectedPrice = '';

    #[Url(as: 'vegetarian')]
    public $selectedVegetarian = '';

    #[Url]
    public $search = '';

    public $filterValues = [
        'diet_categories' => [],
        'halal_assurance' => [],
        'venue_type' => [],
        'areas' => [],
        'cuisines' => [],
        'price_range' => [],
        'vegetarian_type' => [],
    ];

    protected function getFilterArray($string)
    {
        if (empty($string)) return [];
        if (is_array($string)) return array_filter($string);
        return array_filter(explode(',', $string));
    }

    protected function getFilterString($array)
    {
        if (empty($array)) return '';
        if (is_string($array)) return $array;
        return implode(',', array_filter($array));
    }

    public function mount()
    {
        // Initialize all filterValues from URL parameters
        $this->filterValues = [
            'cuisines' => $this->getFilterArray($this->selectedCuisines),
            'diet_categories' => $this->getFilterArray($this->selectedDiet),
            'areas' => $this->getFilterArray($this->selectedArea),
            'halal_assurance' => $this->getFilterArray($this->selectedHalal),
            'venue_type' => $this->getFilterArray($this->selectedVenue),
            'price_range' => $this->getFilterArray($this->selectedPrice),
            'vegetarian_type' => $this->getFilterArray($this->selectedVegetarian),
        ];
    }

    public function updated($property)
    {
        if (str_starts_with($property, 'filterValues')) {
            // Update all URL parameters when any filter changes
            $this->selectedCuisines = $this->getFilterString($this->filterValues['cuisines']);
            $this->selectedDiet = $this->getFilterString($this->filterValues['diet_categories']);
            $this->selectedArea = $this->getFilterString($this->filterValues['areas']);
            $this->selectedHalal = $this->getFilterString($this->filterValues['halal_assurance']);
            $this->selectedVenue = $this->getFilterString($this->filterValues['venue_type']);
            $this->selectedPrice = $this->getFilterString($this->filterValues['price_range']);
            $this->selectedVegetarian = $this->getFilterString($this->filterValues['vegetarian_type']);
            $this->resetPage();
        }
    }

    protected function loadVenues()
    {
        $query = Venue::query()
            ->with([
                'dietCategories:id,display_name',
                'halalAssurance:id,display_name', 
                'venueType:id,display_name',
                'cuisines:id,display_name',
                'priceRange:id,display_name',
                'area:id,display_name',
                'vegetarianType:id,display_name',
                'chain:id,name',
            ])
            ->select('venues.*')
            ->selectRaw('COALESCE(chain_id, id) as group_id')
            ->orderBy('group_id')
            ->orderBy('name');

        if ($this->search) {
            $query->whereLike(['name', 'address', 'dietCategories.display_name', 'halalAssurance.display_name', 'venueType.display_name', 'cuisines.display_name', 'priceRange.display_name', 'vegetarianType.display_name'], $this->search);
        }

        // Apply filters using relationships
        if (!empty($this->filterValues['diet_categories'])) {
            $query->whereHas('dietCategories', function($q) {
                $q->whereIn('display_name', $this->filterValues['diet_categories']);
            });
        }
        if (!empty($this->filterValues['halal_assurance'])) {
            $query->whereHas('halalAssurance', function($q) {
                $q->whereIn('display_name', $this->filterValues['halal_assurance']);
            });
        }
        if (!empty($this->filterValues['venue_type'])) {
            $query->whereHas('venueType', function($q) {
                $q->whereIn('display_name', $this->filterValues['venue_type']);
            });
        }
        if (!empty($this->filterValues['areas'])) {
            $query->whereHas('area', function($q) {
                $q->whereIn('display_name', $this->filterValues['areas']);
            });
        }
        if (!empty($this->filterValues['cuisines'])) {
            $query->whereHas('cuisines', function($q) {
                $q->whereIn('display_name', $this->filterValues['cuisines']);
            });
        }
        if (!empty($this->filterValues['price_range'])) {
            $query->whereHas('priceRange', function($q) {
                $q->whereIn('display_name', $this->filterValues['price_range']);
            });
        }
        if (!empty($this->filterValues['vegetarian_type'])) {
            $query->whereHas('vegetarianType', function($q) {
                $q->whereIn('display_name', $this->filterValues['vegetarian_type']);
            });
        }

        // Get the paginated results first
        $paginatedResults = $query->paginate(15);

        // Group venues by chain_id or their own id if standalone
        $groupedVenues = $paginatedResults->getCollection()
            ->groupBy('group_id')
            ->map(function ($venues) {
                $firstVenue = $venues->first();
                return [
                    'name' => $firstVenue->chain ? $firstVenue->chain->name : $firstVenue->name,
                    'is_chain' => $firstVenue->chain_id !== null,
                    'thumbnail_url' => $firstVenue->thumbnail_url,
                    'venues' => $venues,
                    'shared_attributes' => [
                        'halalAssurance' => $firstVenue->halalAssurance,
                        'dietCategories' => $firstVenue->dietCategories,
                        'vegetarianType' => $firstVenue->vegetarianType,
                        'cuisines' => $firstVenue->cuisines,
                        'priceRange' => $firstVenue->priceRange,
                    ],
                ];
            });

        // Create a new paginator with the grouped results
        $paginatedResults->setCollection($groupedVenues);
        
        return $paginatedResults;
    }

    public function resetFilters()
    {
        $this->filterValues = [
            'diet_categories' => [],
            'halal_assurance' => [],
            'venue_type' => [],
            'areas' => [],
            'cuisines' => [],
            'price_range' => [],
            'vegetarian_type' => [],
        ];
        $this->search = '';
        $this->resetPage();
        //reset url parameters
        $this->selectedCuisines = '';
        $this->selectedDiet = '';
        $this->selectedArea = '';
        $this->selectedHalal = '';
        $this->selectedVenue = '';
        $this->selectedPrice = '';
        $this->selectedVegetarian = '';
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
            'vegetarian_type' => cache()->remember('vegetarian_type', now()->addHour(), fn() => VegetarianType::all(['id', 'display_name'])),
        ];
    }
}; ?>


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" x-data="{ showFilters: false }">
    <!-- Search Section -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
        <div class="w-full sm:max-w-xl">
            <input
                wire:model.live="search"
                type="text"
                placeholder="Search for a place"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary"
            >
        </div>
        <div class="flex gap-2">
            <flux:button href="{{route('map')}}" icon="map">View on Map</flux:button>

            <flux:button 
                @click="showFilters = !showFilters"
                class="sm:hidden relative"
            >
                Filters
                <span 
                    class="absolute -top-2 -right-2 h-5 w-5 bg-primary rounded-full text-xs flex items-center justify-center text-white"
                >
                    {{ 
                        collect($this->filterValues)
                            ->flatten()
                            ->filter()
                            ->count() 
                    }}
                </span>
            </flux:button>
                        <flux:button 
                wire:click="resetFilters"
                variant="filled"
                class="relative sm:hidden"
            >
                Reset
            </flux:button>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-8">
        <!-- Filters Sidebar -->
        <div class="w-full sm:w-64 flex-shrink-0" :class="{ 'hidden sm:block': !showFilters }">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Filtered Search</h2>
                <flux:button 
                    wire:click="resetFilters"
                    class="hidden sm:block"
                    variant="filled"
                >
                    Reset
                </flux:button>
            </div>

            <!-- Dietary Preference -->
            <div class="mb-6">
                <flux:checkbox.group wire:model.live.debounce.500ms="filterValues.diet_categories" label="Dietary preference">
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
                <flux:select 
                    :filter="false"
                    placeholder="Select Halal Assurance"
                    variant="listbox"
                    clearable
                    class="border-0 p-0"
                    wire:model.live="filterValues.halal_assurance" 
                    label="Halal Assurance"
                    multiple
                >
                    @foreach($halal_assurance as $assurance)
                        <flux:option value="{{ $assurance->display_name }}">
                            {{ $assurance->display_name }}
                        </flux:option>
                    @endforeach
                </flux:select>
            </div>

            <!-- Venue Type -->
            <div class="mb-6">
                <flux:select 
                    wire:model.live.debounce.500ms="filterValues.venue_type" 
                    label="Venue Type"
                    placeholder="Select Venue Type"
                    class="border-0 p-0"
                    :filter="false"
                    variant="listbox"
                    clearable
                    multiple
                >
                    @foreach($venue_type as $type)
                        <flux:option value="{{ $type->display_name }}">
                            {{ $type->display_name }}
                        </flux:option>
                    @endforeach
                </flux:select>
            </div>

            <!-- Vegetarian Type -->    
            <div class="mb-6">
                <flux:select 
                    wire:model.live.debounce.500ms="filterValues.vegetarian_type" 
                    label="Vegetarian Type"
                    class="border-0 p-0"
                    placeholder="Select Vegetarian Type"
                    multiple
                    :filter="false"
                    variant="listbox"
                    clearable
                >
                    @foreach($vegetarian_type as $type)
                        <flux:option value="{{ $type->display_name }}">
                            {{ $type->display_name }}
                        </flux:option>
                    @endforeach
                </flux:select>
            </div>

            <!-- Area -->
            <div class="mb-6">
                <flux:select 
                    wire:model.live.debounce.500ms="filterValues.areas" 
                    label="Area"
                    searchable
                    placeholder="Select Area"
                    class="border-0 p-0"
                    variant="listbox"
                    clearable   
                    multiple
                >
                    @foreach($areas as $area)
                        <flux:option value="{{ $area->display_name }}">
                            {{ $area->display_name }}
                        </flux:option>
                    @endforeach
                </flux:select>
            </div>

            <!-- Cuisines -->
            <div class="mb-6">
                <flux:select 
                    wire:model.live.debounce.500ms="filterValues.cuisines" 
                    label="Cuisines"
                    placeholder="Select Cuisines"
                    multiple
                    class="border-0 p-0"
                    variant="listbox"
                    clearable
                    searchable
                >
                    @foreach($cuisines as $cuisine)
                        <flux:option value="{{ $cuisine->display_name }}">
                            {{ $cuisine->display_name }}
                        </flux:option>
                    @endforeach
                </flux:select>
            </div>

            <!-- Price Range -->
            <div class="mb-6">
                <flux:select 
                    class="border-0 p-0"
                    wire:model.live.debounce.500ms="filterValues.price_range" 
                    placeholder="Select Price Range"
                    label="Price Range"
                    multiple
                    :filter="false"
                    variant="listbox"
                    clearable
                >
                    @foreach($price_range as $range)
                        <flux:option value="{{ $range->display_name }}">
                            {{ $range->display_name }}
                        </flux:option>
                    @endforeach
                </flux:select>
            </div>
        </div>

        <!-- Venue Cards -->
        <div class="flex-1">
            <div class="grid grid-cols-1 gap-6">
                @foreach($venues as $group)
                    <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow sm:card-side">
                        <figure class="h-48 sm:h-56 sm:w-1/3">
                            <img
                                src="{{ $group['thumbnail_url'] ? Storage::disk('s3')->url($group['thumbnail_url']) : 'https://placehold.co/600x400' }}"
                                alt="{{ $group['name'] }}"
                                class="w-full h-full object-cover"
                            >
                        </figure>
                        <div class="card-body sm:w-2/3">
                            <div class="flex justify-between items-start">
                                <h3 class="card-title">
                                    {{ $group['name'] }}
                                    @if($group['is_chain'])
                                        <span class="badge badge-secondary">Chain</span>
                                    @endif
                                </h3>
                            </div>

                            <div class="flex flex-wrap gap-2">
                                @if($group['shared_attributes']['halalAssurance'])
                                    <div class="badge badge-primary">
                                        {{ $group['shared_attributes']['halalAssurance']->display_name }}
                                    </div>
                                @endif
                                @foreach($group['shared_attributes']['dietCategories'] as $category)
                                    <div class="badge badge-primary">
                                        {{ $category->display_name }}
                                    </div>
                                @endforeach
                                @if($group['shared_attributes']['vegetarianType'])
                                    <div class="badge badge-primary">
                                        {{ $group['shared_attributes']['vegetarianType']->display_name }}
                                    </div>
                                @endif
                                @foreach($group['shared_attributes']['cuisines'] as $cuisine)
                                    <div class="badge badge-primary badge-outline">
                                        {{ $cuisine->display_name }}
                                    </div>
                                @endforeach
                                @if($group['shared_attributes']['priceRange'])
                                    <div class="badge badge-accent badge-outline">
                                        {{ $group['shared_attributes']['priceRange']->display_name }}
                                    </div>
                                @endif
                            </div>

                            <div class="space-y-2">
                                <h4 class="font-semibold">{{ $group['is_chain'] ? 'Locations:' : 'Address:' }}</h4>
                                @foreach($group['venues'] as $venue)
                                    <div class="text-base-content/70 flex items-start gap-2">
                                        <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <p class="flex-1">{{ $venue->address }}</p>
                                    </div>
                                @endforeach
                            </div>
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
