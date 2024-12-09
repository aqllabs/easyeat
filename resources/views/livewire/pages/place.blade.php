<?php
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Venue;
use Illuminate\Support\Facades\Storage;

new #[Layout('layouts.home')] 
class extends Component {
    public $place;

    public function mount($id)
    {
        $this->place = Venue::with(['cuisines', 'dietCategories', 'halalAssurance', 'priceRange', 'venueType'])->findOrFail($id);
    }
}; ?>

<div class="container mx-auto px-4 py-8">
    <!-- Header Section with Rating -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-4xl font-bold">{{ $place->name }}</h1>
            <div class="text-gray-600">{{ $place->venueType?->display_name }}</div>
        </div>
    </div>

    <!-- Main Image Gallery -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="aspect-video rounded-lg overflow-hidden">
            <img src="{{ $place->thumbnail_url ? Storage::disk('s3')->temporaryUrl($place->thumbnail_url, now()->addMinutes(5)) : 'https://placehold.co/600x400' }}" 
                 alt="{{ $place->name }}" 
                 class="w-full h-full object-cover">
        </div>
        @if($place->images)
        <div class="grid grid-cols-2 gap-4">
            @foreach(array_slice($place->images, 0, 2) as $image)
            <div class="aspect-square rounded-lg overflow-hidden">
                <img src="{{ Storage::disk('s3')->temporaryUrl($image, now()->addMinutes(5)) }}" 
                     alt="{{ $place->name }}" 
                     class="w-full h-full object-cover">
            </div>
            @endforeach
        </div>
        @endif
    </div>

    <!-- Tags -->
    <div class="flex flex-wrap gap-2 mb-6">
        @foreach($place->cuisines as $cuisine)
            <span class="px-3 py-1 bg-gray-100 rounded-full text-sm">{{ $cuisine->display_name ?? '' }}</span>
        @endforeach
        @foreach($place->dietCategories as $category)
            <span class="px-3 py-1 bg-green-100 rounded-full text-sm">{{ $category->display_name ?? '' }}</span>
        @endforeach
    </div>

    <!-- Description -->
    <div class="mb-8">
        <p class="text-gray-700 leading-relaxed">{{ $place->description }}</p>
    </div>

    <!-- Info Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <div class="space-y-4">
            @if($place->website)
            <div>
                <h3 class="font-semibold">Website</h3>
                <a href="{{ $place->website }}" class="text-blue-500 hover:underline" target="_blank">Visit Website</a>
            </div>
            @endif
            <div>
                <h3 class="font-semibold">Halal Status:</h3>
                <p>{{ $place->halalAssurance?->display_name ?? 'Not Specified' }}</p>
                @if($place->halal_assurance_expiry_date)
                <p class="text-sm text-gray-500">Valid until: {{ $place->halal_assurance_expiry_date->format('d M Y') }}</p>
                @endif
            </div>
            <div>
                <h3 class="font-semibold">Address:</h3>
                <p>{{ $place->address }}, {{ $place->area?->display_name ?? '' }}, {{ $place->city }}</p>
            </div>
            <div>
                <h3 class="font-semibold">Price Range:</h3>
                <p>{{ $place->priceRange?->display_name ?? '' }}</p>
            </div>
            @if($place->telephone)
            <div>
                <h3 class="font-semibold">Contact:</h3>
                <p>{{ $place->telephone }}</p>
            </div>
            @endif
            @if($place->opening_hours)
            <div>
                <h3 class="font-semibold">Opening Hours:</h3>
                <p>{{ json_decode($place->opening_hours)->raw }}</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Map Section -->
    <div class="mt-8">
        <h3 class="text-2xl font-semibold mb-4">Location</h3>
        <div id="map" class="w-full h-64 rounded-lg shadow-md"></div>
    </div>
</div>

@push('scripts')
<script>
    // Loader code should only be included once in your application
    if (!window.initGoogleMapsLoader) {
        window.initGoogleMapsLoader = (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
            key: "{{ env('GOOGLE_MAPS_API_KEY') }}",
            v: "weekly"
        });
    }

    // Clean up previous instance if it exists
    if (window.currentMap) {
        window.currentMap = null;
    }

    async function initMap() {
        try {
            const { Map } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
            
            const position = { lat: {{ $place->lat }}, lng: {{ $place->lng }} };
            
            window.currentMap = new Map(document.getElementById("map"), {
                zoom: 15,
                center: position,
                mapId: "DEMO_MAP_ID",
            });

            const marker = new AdvancedMarkerElement({
                map: window.currentMap,
                position: position,
                title: '{{ $place->name }}'
            });

            const contentString = `
                <div class="p-2 max-w-xs">
                    <h3 class="font-bold">{{ $place->name }}</h3>
                    <p class="text-sm">{{ $place->address }}</p>
                    <a href="https://www.google.com/maps/dir/?api=1&destination={{ $place->lat }},{{ $place->lng }}" 
                       class="text-blue-500 hover:underline text-sm" 
                       target="_blank">
                        Get Directions
                    </a>
                </div>
            `;

            const { InfoWindow } = await google.maps.importLibrary("maps");
            const infoWindow = new InfoWindow({
                content: contentString
            });

            marker.addListener('click', () => {
                infoWindow.open(window.currentMap, marker);
            });
        } catch (error) {
            console.error("Error initializing map:", error);
        }
    }

    // Initialize map when the DOM is ready
    if (document.readyState === "complete") {
        initMap();
    } else {
        window.addEventListener('load', initMap);
    }

    // Clean up when Livewire navigates away
    document.addEventListener('livewire:navigating', () => {
        if (window.currentMap) {
            window.currentMap = null;
        }
    });
</script>
@endpush

