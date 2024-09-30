<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden border border-base-content/20 shadow-xl sm:rounded-lg p-12 text-2xl">
                <p class="text-2xl">Welcome, {{ auth()->user()->name }}</p>
            </div>
        </div>
    </div>

    @if(auth()->user()->subscribed())
        <h2 class="font-semibold text-xl text-center leading-tight">
            {{ __('You are subscribed!') }}
        </h2>
    @else
        <livewire:plans />
    @endif
</x-app-layout>
