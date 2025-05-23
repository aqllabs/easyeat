<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('seo.title', config('app.name', 'EasyEat - Find Restaurants for Your Dietary Needs'))</title>

    <meta name="description" content="@yield('seo.description', 'Discover restaurants that cater to your dietary requirements. Find gluten-free, vegan, halal, kosher, and allergy-friendly dining options near you.')">
    <meta name="keywords" content="@yield('seo.keywords', 'dietary restrictions, food allergies, gluten-free restaurants, vegan dining, halal food, kosher restaurants, allergen-free, dietary requirements')">
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('seo.title', config('app.name', 'EasyEat - Dietary-Friendly Restaurant Finder'))">
    <meta name="twitter:description" content="@yield('seo.description', 'Find the perfect restaurant for your dietary needs. Browse reviews and menus filtered by allergies, restrictions, and preferences.')">
    <meta name="twitter:image" content="@yield('seo.image', asset('images/easyeat-social-share.jpg'))">
    <meta name="twitter:site" content="@EasyEat">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=1">
    <!-- Open Graph Tags -->
    <meta property="og:title" content="@yield('seo.title', config('app.name', 'EasyEat - Dietary-Friendly Restaurant Finder'))">
    <meta property="og:description" content="@yield('seo.description', 'Find the perfect restaurant for your dietary needs. Browse reviews and menus filtered by allergies, restrictions, and preferences.')">
    <meta property="og:image" content="@yield('seo.image', asset('images/easyeat-social-share.jpg'))">
    <meta property="og:type" content="website">

    <link rel="canonical" href="{{ request()->url() }}">

    <!-- Auto Dark-Mode -->
    <script>
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.setAttribute('data-theme', 'dim');
        }
    </script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

{{--    For LemonSqueezy--}}
{{--    @lemonJS--}}

{{--    For Paddle--}}
{{--    @paddleJS--}}
    <!-- Scripts -->
    @viteReactRefresh
    @stack('scripts')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

    <!-- Styles -->
    @livewireStyles
    @fluxStyles
    @filamentStyles

    <!-- Umami Analytics -->
    <script defer src="https://cloud.umami.is/script.js" data-website-id="35207053-f7eb-481e-9178-8b082141f149"></script>

</head>
<body>
<x-banner/>
{{--<livewire:coming-soon/>--}}
<livewire:header/>

<div class="mx-auto max-w-7xl px-6 lg:px-8">
    {{ $slot }}
</div>

<livewire:footer/>
<livewire:copyright/>   

@livewireScripts
@fluxScripts
@filamentScripts

{{--for SweetAlert2--}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />

@include('schema')
</body>
</html>
