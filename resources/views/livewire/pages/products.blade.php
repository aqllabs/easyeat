<?php

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.home')]
class extends Component
{
    public function with(): array
    {
        return [
            'products' => Product::with('prices')->get(),
        ];
    }
}; ?>


<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Our Products</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if ($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover" />
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No image available</span>
                    </div>
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                    <p class="text-gray-600 mb-4">{{ $product->description }}</p>

                    @if ($product->prices->count() > 0)
                        <div class="mb-4">
                            <span class="font-bold">Price:</span>
                            <span>{{ $product->prices->first()->unit_amount / 100 }} {{ strtoupper($product->prices->first()->currency) }}</span>
                        </div>
                    @endif

                    <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">View Details</a>
                </div>
            </div>
        @endforeach
    </div>

    @if ($products->isEmpty())
        <div class="text-center py-8">
            <p class="text-gray-600 text-xl">No products available at the moment.</p>
        </div>
    @endif
</div>
