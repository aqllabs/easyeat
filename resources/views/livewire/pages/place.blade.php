<?php

use Livewire\Attributes\Layout;

use Livewire\Volt\Component;
new #[Layout('layouts.app')]
class extends Component {

    public $place;

    public function mount($id)
    {

        // Create dummy data for a restaurant
        $dummyPlace = [
            'id' => 1,
            'name' => 'Golden Dragon Restaurant',
            'cousine' => 'Chinese',
            'rating' => 4.5,
            'address' => '123 Main Street, Central, Hong Kong',
            'area' => 'Central',
            'phone' => '+852 1234 5678',
            'website' => 'https://www.goldendragon.com',
            'image_url' => 'https://placehold.co/600x400?text=Golden+Dragon',
            'description' => 'Golden Dragon Restaurant offers an authentic Chinese dining experience with a modern twist. Our chefs use traditional recipes and fresh, local ingredients to create delicious dishes that will tantalize your taste buds.',
            'latitude' => 22.2828,
            'longitude' => 114.1588,
        ];

        // Simulate fetching the place from the database
        $this->place = (object) $dummyPlace;
    }
}; ?>


<div class="container mx-auto px-4 py-8">
    <div class="card lg:card-side bg-base-100 shadow-xl">
        <figure class="lg:w-1/2">
            <img src="{{ $place->image_url ?? 'https://placehold.co/600x400?text=No+Image' }}" alt="{{ $place->name }}" class="w-full h-full object-cover">
        </figure>
        <div class="card-body lg:w-1/2">
            <h2 class="card-title text-3xl font-bold">{{ $place->name }}</h2>
            <p class="text-xl text-base-content/70">{{ $place->cousine }}</p>
            <div class="flex items-center mt-2">
                <div class="rating rating-md">
                    @for ($i = 1; $i <= 5; $i++)
                        <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" {{ $i <= $place->rating ? 'checked' : '' }} disabled/>
                    @endfor
                </div>
                <span class="ml-2 text-base-content/70">({{ $place->rating }} / 5)</span>
            </div>
            <p class="mt-4"><strong>Address:</strong> {{ $place->address }}</p>
            <p><strong>Area:</strong> {{ $place->area }}</p>
            @if($place->phone)
                <p><strong>Phone:</strong> {{ $place->phone }}</p>
            @endif
            @if($place->website)
                <p><strong>Website:</strong> <a href="{{ $place->website }}" class="link link-primary" target="_blank">Visit Website</a></p>
            @endif
            <div class="card-actions justify-end mt-4">
                <button class="btn btn-primary">Book a Table</button>
            </div>
        </div>
    </div>

    @if($place->description)
        <div class="mt-8">
            <h3 class="text-2xl font-semibold mb-4">About {{ $place->name }}</h3>
            <p class="text-base-content/80">{{ $place->description }}</p>
        </div>
    @endif

    <div class="mt-8">
        <h3 class="text-2xl font-semibold mb-4">Location</h3>
        <div id="map" class="w-full h-64 rounded-lg shadow-md"></div>
    </div>
</div>
{{-- 
@push('scripts')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([{{ $place->_geoloc['lat'] }}, {{ $place->_geoloc['lng'] }}], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([{{ $place->_geoloc['lat'] }}, {{ $place->_geoloc['lng'] }}]).addTo(map)
            .bindPopup('{{ $place->name }}')
            .openPopup();
    });
</script>
@endpush --}}

