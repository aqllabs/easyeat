<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('seo.title', config('app.name', 'Laravel'))</title>

    <meta name="description" content="@yield('seo.description', 'Your default description goes here')">
    <meta name="keywords" content="@yield('seo.keywords', 'your, default, keywords')">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('seo.title', config('app.name', 'Laravel'))">
    <meta name="twitter:description" content="@yield('seo.description', 'Your default description goes here')">
    <meta name="twitter:image" content="@yield('seo.image', 'Your default description goes here')">
    <meta name="twitter:site" content="@yourtwitterhandle">
    <!-- OG-->
    <meta name="og:title" content="@yield('seo.title', config('app.name', 'Laravel'))">
    <meta name="og:description" content="@yield('seo.description', 'Your default description goes here')">
    <meta name="og:image" content="@yield('seo.image', 'Your default description goes here')">

    <link rel="canonical" href="{{ request()->url() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body>
<x-banner/>
<livewire:coming-soon/>
@livewireScripts

{{--for SweetAlert2--}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />

@include('schema')
</body>
</html>
