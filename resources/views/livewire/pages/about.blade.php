<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\ContactResponse;
new #[Layout('layouts.home')]
class extends Component {

    public $name;
    public $email;
    public $message;

    public function storeContactResponse() {
        $validated = $this->validate([
            'email' => 'required|email',
            'message' => 'required|min:10',
            'name' => 'required|min:2'
        ]);

        ContactResponse::create($validated);
        $this->reset(['name', 'email', 'message']);
        
        session()->flash('success', 'Thank you for your message! We will get back to you soon.');
        $this->dispatch('scroll-to-top');
    }

}; ?>

<div class="mt-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if (session()->has('success'))
        <div class="mb-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Hero Section -->
    <div class="text-center mb-20">
        <div class="flex justify-center">
            <img src="{{ asset('/images/aboutus.png') }}" alt="EasyEat Logo" class="h-24 w-auto">
        </div>
        <h1 class="text-5xl font-bold text-gray-800 mb-6 leading-tight">About EasyEat</h1>
        <p class="text-2xl text-gray-700 max-w-3xl mx-auto leading-relaxed">Hong Kong's first one-stop, user-friendly platform that helps people with dietary requirements easily locate suitable restaurants.</p>
    </div>

    <!-- Problem & Solution Section -->
    <div class="mb-20">
        <div class="bg-white rounded-xl shadow-md p-10 border border-orange-100">
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">The Problem</h2>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Hong Kong is known to be an international city however there has always been a struggle for those in the underrepresented communities to locate dining options that cater to their unique dietary needs. Existing platforms, apps, websites, and blogs offer too many choices and can be difficult to navigate, making it overwhelming to find the right place to dine.
                </p>
            </div>
            
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Solution</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Easy Eat allows people from diverse backgrounds and dietary needs to find restaurants in Hong Kong that cater to their needs, including Vegetarian, Vegan, Jain and Halal food.
                </p>
            </div>

            <div class="text-center mb-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h2>
                <p class="text-gray-600 text-lg">
                    To promote inclusive dining, believing that eating should be made easy for everyone.
                </p>
            </div>

            <!-- USP Section -->
            <div class="grid md:grid-cols-3 gap-12 mt-12">
                <div class="text-center p-6 hover:bg-orange-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">User-friendly interface</h3>
                    <p class="text-gray-700">Simple and intuitive platform designed for everyone.</p>
                </div>
                <div class="text-center p-6 hover:bg-orange-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Streamlined options</h3>
                    <p class="text-gray-700">Convenient filtering system to find exactly what you need.</p>
                </div>
                <div class="text-center p-6 hover:bg-orange-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Celebrating diversity</h3>
                    <p class="text-gray-700">By the people, for the people - Run by the ethnically diverse community.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Story Section -->
    <div class="mb-20">
        <div class="bg-white rounded-xl shadow-md p-10 border border-orange-100">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Our Story</h2>
            <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                Easy Eat was introduced by Foodie Explorerz, the existing No.1 Instagram page catering to people with dietary requirements in Hong Kong. Foodie Explorerz was introduced as a page to share restaurants in Hong Kong, however after the founder realised they had dietary requirements and was limited to what type of content they could post they decided to focus and cater to this niche and underrepresented community.
            </p>
            <p class="text-gray-700 mb-8 leading-relaxed">
                Foodie Explorerz has now grown to 24k Followers, and has been growing for the past 4 years- making headlines in large media publications including SCMP, CGTN, CNA and more!
            </p>
            
            <!-- Media Coverage Section -->
            <div class="space-y-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Featured In</h3>
                
                <!-- Major Media Logos -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
                    <!-- RTHK -->
                    <a href="https://www.rthk.hk/radio/radio3/programme/backchat/episode/978515/autoplay/contentindex/1" 
                       target="_blank" 
                       class="group p-4 hover:bg-orange-50 rounded-lg transition duration-300">
                        <img src="{{ asset('/images/media-logos/rthk.png') }}" 
                             alt="RTHK" 
                             class="h-28 w-full object-contain opacity-90 hover:opacity-100">
                    </a>

                    <!-- CNA -->
                    <a href="https://www.channelnewsasia.com/east-asia/hong-kong-woo-southeast-asia-muslim-tourists-diversify-mainland-4581351" 
                       target="_blank" 
                       class="group p-4 hover:bg-orange-50 rounded-lg transition duration-300">
                        <img src="{{ asset('/images/media-logos/cna.png') }}" 
                             alt="CNA" 
                             class="h-28 w-full object-contain opacity-90 hover:opacity-100">
                    </a>

                    <!-- CGTN -->
                    <a href="https://francais.cgtn.com/news/2024-06-22/1804344490073722881/index.html" 
                       target="_blank" 
                       class="group p-4 hover:bg-orange-50 rounded-lg transition duration-300">
                        <img src="{{ asset('/images/media-logos/cgtn.png') }}" 
                             alt="CGTN" 
                             class="h-28 w-full object-contain opacity-90 hover:opacity-100">
                    </a>

                    <!-- SCMP -->
                    <a href="https://www.scmp.com/video/scmp-originals/3264884/hong-kong-wants-more-muslim-travellers-are-citys-halal-dining-options-lacking" 
                       target="_blank" 
                       class="group p-4 hover:bg-orange-50 rounded-lg transition duration-300">
                        <img src="{{ asset('/images/media-logos/scmp.png') }}" 
                             alt="SCMP" 
                             class="h-28 w-full object-contain opacity-90 hover:opacity-100">
                    </a>
                </div>

                <!-- Extended Media Coverage Grid -->
                <div class="grid md:grid-cols-4 gap-8">
                    <a href="https://youtu.be/OA8KlobYNTI?si=aZos_5DA3gMkVD6t" 
                       target="_blank" 
                       class="group p-4 hover:bg-orange-50 rounded-lg transition duration-300">
                        <img src="{{ asset('/images/media-logos/cna.png') }}" 
                             alt="YouTube" 
                             class="h-28 w-full object-contain opacity-90 hover:opacity-100">
                    </a>

                    <a href="https://www.straitstimes.com/asia/east-asia/hong-kong-seeks-to-expand-halal-food-options-to-draw-more-muslim-tourists" 
                       target="_blank" 
                       class="group p-4 hover:bg-orange-50 rounded-lg transition duration-300">
                        <img src="{{ asset('/images/media-logos/straits.png') }}" 
                             alt="Straits Times" 
                             class="h-28 w-full object-contain opacity-90 hover:opacity-100">
                    </a>

                    <a href="https://www.scmp.com/news/hong-kong/hong-kong-economy/article/3259242/can-hong-kong-be-more-muslim-friendly-having-more-halal-dining-options-can-help-attract-middle-east" 
                       target="_blank" 
                       class="group p-4 hover:bg-orange-50 rounded-lg transition duration-300">
                        <img src="{{ asset('/images/media-logos/scmp.png') }}" 
                             alt="SCMP" 
                             class="h-28 w-full object-contain opacity-90 hover:opacity-100">
                    </a>

                    <a href="https://www.scmp.com/news/hong-kong/society/article/3199392/halal-hong-kong-muslims-cheer-kfcs-move-hope-more-fast-food-chains-restaurants-will-cater-community" 
                       target="_blank" 
                       class="group p-4 hover:bg-orange-50 rounded-lg transition duration-300">
                        <img src="{{ asset('/images/media-logos/scmp.png') }}" 
                             alt="SCMP" 
                             class="h-28 w-full object-contain opacity-90 hover:opacity-100">
                    </a>

                    <a href="https://sassyhongkong.com/halal-restaurants-in-hong-kong-eat-drink/" 
                       target="_blank" 
                       class="group p-4 hover:bg-orange-50 rounded-lg transition duration-300">
                        <img src="{{ asset('/images/media-logos/sassy.png') }}" 
                             alt="Sassy Hong Kong" 
                             class="h-28 w-full object-contain opacity-90 hover:opacity-100">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Partners Section -->
    <div class="mb-20">
        <div class="bg-white rounded-xl shadow-md p-10 border border-orange-100">
            <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">Our Partners</h2>
            <div class="grid grid-cols-3 gap-12 items-center justify-items-center">
                <img src="/images/partners/hkstp.png" alt="HKSTP" class="h-36 object-contain">
                <img src="/images/partners/fsi.png" alt="FSI" class="h-36 object-contain">
                <img src="/images/partners/guidefong.png" alt="GuideFong" class="h-36 object-contain">
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="mb-20">
        <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-10 shadow-md">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Contact Us</h2>
            <p class="text-lg text-gray-700 text-center mb-10">For inquiries about our platform or business opportunities please reach out to us at <a href="mailto:info@tryeasyeat.com" class="text-orange-500 hover:text-orange-600">info@tryeasyeat.com</a> or fill out the contact form below.</p>
            
            <!-- Contact Form -->
            <div class="max-w-2xl mx-auto">
                <form class="space-y-8" wire:submit.prevent="storeContactResponse">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" wire:model="name" id="name" required
                               class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm 
                                      focus:border-orange-500 focus:ring-orange-500 
                                      hover:border-orange-400 transition duration-300">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" wire:model="email" id="email" required
                               class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm 
                                      focus:border-orange-500 focus:ring-orange-500 
                                      hover:border-orange-400 transition duration-300">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2" >Message</label>
                        <textarea wire:model="message" name="message" id="message" rows="4" required
                                  class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm 
                                         focus:border-orange-500 focus:ring-orange-500 
                                         hover:border-orange-400 transition duration-300"></textarea>
                    </div>
                    <div>
                        <button type="submit" 
                                class="w-full flex justify-center py-4 px-6 border border-transparent 
                                       rounded-lg shadow-sm text-lg font-medium text-white 
                                       bg-orange-500 hover:bg-orange-600 transition duration-300 
                                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('scroll-to-top', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</div> 