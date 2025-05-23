<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.home')]
class extends Component {
    public function mount() {
        // Component initialization
    }
}; ?>

<div class="mt-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="text-center mb-20">
        <h1 class="text-5xl font-bold text-gray-800 mb-6 leading-tight">Transform Your F&B Business</h1>
        <p class="text-2xl text-gray-700 max-w-3xl mx-auto leading-relaxed">Data-driven marketing solutions that increase foot traffic, boost orders, and grow your revenue</p>
    </div>

    <!-- Marketing Services Section -->
    <div class="mb-20">
        <div class="bg-white rounded-xl shadow-md p-10 border border-orange-100">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Premium F&B Marketing Solutions</h2>
            
            <div class="grid md:grid-cols-3 gap-12 mt-12">
                <!-- Branding Consultation -->
                <div class="text-center p-6 hover:bg-orange-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Branding Consultation</h3>
                    <p class="text-gray-700">Develop a memorable brand identity that sets you apart from competitors and resonates with your target audience</p>
                </div>

                <!-- Social Media Marketing -->
                <div class="text-center p-6 hover:bg-orange-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Social Media Marketing</h3>
                    <p class="text-gray-700">Drive engagement and build a loyal following with targeted campaigns that showcase your unique culinary offerings</p>
                </div>

                <!-- Content Creation -->
                <div class="text-center p-6 hover:bg-orange-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Content Creation</h3>
                    <p class="text-gray-700">Professional food photography and mouth-watering content that drives customer cravings and increases orders</p>
                </div>
            </div>
                <div class="grid md:grid-cols-3 gap-12 mt-12">

                <!-- Influencer Marketing -->
                <div class="text-center p-6 hover:bg-orange-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Influencer Marketing</h3>
                    <p class="text-gray-700">Partner with food influencers to amplify your reach, build credibility, and attract new customers to your establishment</p>
                </div>


                <!-- Email Marketing -->
                <div class="text-center p-6 hover:bg-orange-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Email Marketing</h3>
                    <p class="text-gray-700">Convert one-time visitors into repeat customers with personalized campaigns, special offers, and loyalty programs</p>
                </div>

                <!-- SEO & Local Marketing -->
                <div class="text-center p-6 hover:bg-orange-50 rounded-lg transition duration-300">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">SEO & Local Marketing</h3>
                    <p class="text-gray-700">Dominate local search results and drive foot traffic with targeted local SEO strategies and Google My Business optimization</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="mb-20">
        <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-10 shadow-md">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Boost Your Revenue With Expert Marketing</h2>
            <p class="text-lg text-gray-700 text-center mb-6">Join the hundreds of F&B businesses that have grown their customer base by an average of 40% in just 3 months.</p>
            <p class="text-lg text-gray-700 text-center mb-10">Contact us at <a href="mailto:marketing@tryeasyeat.com" class="text-orange-500 hover:text-orange-600 font-medium">marketing@tryeasyeat.com</a> or fill out the form below for a <span class="font-semibold">free marketing consultation</span>.</p>
            
            <div class="max-w-2xl mx-auto">
                <form wire:submit="storeContactResponse" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" wire:model="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" wire:model="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea wire:model="message" id="message" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-orange-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 