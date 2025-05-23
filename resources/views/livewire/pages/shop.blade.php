<?php

use App\Models\FoodProduct;
use App\Models\ProductType;
use App\Models\DietaryRequirement;
use App\Models\Venue;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

new #[Layout('layouts.home')]
class extends Component {
    use WithPagination;

    // Define URL parameters for all filter types
    #[Url(as: 'product_types')]
    public $selectedProductTypes = '';

    #[Url(as: 'dietary')]
    public $selectedDietary = '';

    #[Url(as: 'halal')]
    public $isHalal = false;

    #[Url(as: 'no_alcohol')]
    public $noAlcohol = false;

    #[Url]
    public $search = '';

    public $filterValues = [
        'product_types' => [],
        'dietary_requirements' => [],
        'is_halal' => false,
        'no_alcohol' => false,
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
            'product_types' => $this->getFilterArray($this->selectedProductTypes),
            'dietary_requirements' => $this->getFilterArray($this->selectedDietary),
            'is_halal' => $this->isHalal,
            'no_alcohol' => $this->noAlcohol,
        ];
    }

    public function updated($property)
    {
        if (str_starts_with($property, 'filterValues')) {
            // Update all URL parameters when any filter changes
            $this->selectedProductTypes = $this->getFilterString($this->filterValues['product_types']);
            $this->selectedDietary = $this->getFilterString($this->filterValues['dietary_requirements']);
            $this->isHalal = $this->filterValues['is_halal'];
            $this->noAlcohol = $this->filterValues['no_alcohol'];
            $this->resetPage();
        }
    }

    protected function loadProducts()
    {
        $query = FoodProduct::search($this->search)
            ->query(fn (Builder $query) => 
                $query->with([
                    'dietaryRequirements:id,display_name',
                    'productTypes:id,display_name',
                    'venue:id,name',
                ])
            );

        // Apply filters using relationships
        if (!empty($this->filterValues['product_types'])) {
            $query->whereIn('product_types', $this->filterValues['product_types']);
        }
        if (!empty($this->filterValues['dietary_requirements'])) {
            $query->whereIn('dietary_requirements', $this->filterValues['dietary_requirements']);
        }
        if ($this->filterValues['is_halal']) {
            $query->where('is_halal', true);
        }
        if ($this->filterValues['no_alcohol']) {
            $query->where('no_alcohol', true);
        }

        return $query->paginate(15);
    }

    public function resetFilters()
    {
        $this->filterValues = [
            'product_types' => [],
            'dietary_requirements' => [],
            'is_halal' => false,
            'no_alcohol' => false,
        ];
        $this->search = '';
        $this->resetPage();
        // Reset URL parameters
        $this->selectedProductTypes = '';
        $this->selectedDietary = '';
        $this->isHalal = false;
        $this->noAlcohol = false;
    }

    public function with()
    {
        return [
            'products' => $this->loadProducts(),
            'product_types' => cache()->remember('product_types', now()->addHour(), fn() => ProductType::all(['id', 'display_name'])),
            'dietary_requirements' => cache()->remember('dietary_requirements', now()->addHour(), fn() => DietaryRequirement::all(['id', 'display_name'])),
        ];
    }
}; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" x-data="{ showFilters: false }">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Food Products</h1>
        <p class="mt-2 text-gray-600">Discover amazing food products from local shops and businesses</p>
    </div>

    <!-- Search Section -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
        <div class="w-full sm:max-w-xl">
            <input
                wire:model.live="search"
                type="text"
                placeholder="Search for a product"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary"
            >
        </div>
        <div class="flex gap-2">
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
                <h2 class="text-lg font-semibold">Filters</h2>
                <flux:button 
                    wire:click="resetFilters"
                    class="hidden sm:block"
                    variant="filled"
                >
                    Reset
                </flux:button>
            </div>

            <!-- Product Types -->
            <div class="mb-6">
                <flux:select 
                    wire:model.live.debounce.500ms="filterValues.product_types" 
                    label="Product Types"
                    placeholder="Select Product Types"
                    multiple
                    class="border-0 p-0"
                    variant="listbox"
                    clearable
                    searchable
                >
                    @foreach($product_types as $type)
                        <flux:option value="{{ $type->display_name }}">
                            {{ $type->display_name }}
                        </flux:option>
                    @endforeach
                </flux:select>
            </div>

            <!-- Dietary Requirements -->
            <div class="mb-6">
                <flux:select 
                    wire:model.live.debounce.500ms="filterValues.dietary_requirements" 
                    label="Dietary Requirements"
                    placeholder="Select Dietary Requirements"
                    multiple
                    class="border-0 p-0"
                    variant="listbox"
                    clearable
                    searchable
                >
                    @foreach($dietary_requirements as $req)
                        <flux:option value="{{ $req->display_name }}">
                            {{ $req->display_name }}
                        </flux:option>
                    @endforeach
                </flux:select>
            </div>

            <!-- Halal -->
            <div class="mb-6">
                <flux:checkbox
                    wire:model.live.debounce.500ms="filterValues.is_halal"
                    label="Halal Products"
                />
            </div>

            <!-- No Alcohol -->
            <div class="mb-6">
                <flux:checkbox
                    wire:model.live.debounce.500ms="filterValues.no_alcohol"
                    label="No Alcohol"
                />
            </div>
        </div>

        <!-- Product Cards -->
        <div class="flex-1">
            @if($products->isEmpty())
                <div class="flex flex-col items-center justify-center bg-gray-50 rounded-lg p-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M12 13a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900">No products found</h3>
                    <p class="text-gray-500 mt-1">Try adjusting your search or filter criteria</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="aspect-video overflow-hidden">
                                <img src="{{ $product->thumbnail_url ? Storage::disk('s3')->url($product->thumbnail_url) : 'https://placehold.co/600x400?text=Product+Image' }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg mb-2">{{ $product->name }}</h3>
                                <p class="text-gray-700 text-sm line-clamp-2 mb-3">{{ $product->description }}</p>
                                
                                <!-- Tags -->
                                <div class="flex flex-wrap gap-1 mb-3">
                                    @foreach($product->productTypes as $type)
                                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">{{ $type->display_name }}</span>
                                    @endforeach
                                    @foreach($product->dietaryRequirements as $req)
                                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{ $req->display_name }}</span>
                                    @endforeach
                                    @if($product->is_halal)
                                        <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Halal</span>
                                    @endif
                                    @if($product->no_alcohol)
                                        <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">No Alcohol</span>
                                    @endif
                                </div>

                                <!-- Shop Info -->
                                @if($product->venue)
                                    <div class="text-sm text-gray-600">
                                        <span class="font-medium">Shop:</span> {{ $product->venue->name }}
                                    </div>
                                @endif

                                <!-- CTA -->
                                <div class="mt-4 flex justify-between items-center">
                                    @if($product->website)
                                        <a href="{{ $product->website }}" target="_blank" class="text-primary hover:text-primary-focus text-sm font-medium">Visit Website</a>
                                    @endif
                                    <flux:button size="sm">Details</flux:button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</div> 