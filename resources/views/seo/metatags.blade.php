@php
    $title = 'Your default title goes here';
    $description = 'Your default description goes here';
    $image = 'your-default-image-url.jpg';
    $keywords = 'your, default, keywords, goes, here';
    $canonical = request()->url();
@endphp

@if(isset($seo))
    @php
        $title = $seo['title'] ?? $title;
        $description = $seo['description'] ?? $description;
        $image = $seo['image'] ?? $image;
        $keywords = $seo['keywords'] ?? $keywords;
        $canonical = $seo['canonical'] ?? $canonical;
    @endphp
@endif

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<link rel="canonical" href="{{ $canonical }}">
<!-- OG-->
<meta name="og:title" content="{{ $title }}">
<meta name="og:description" content="{{ $description }}">
<meta name="og:image" content="{{ $image }}">

<!-- Twitter Card Tags -->
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">
{{--Default Meta Tags ( Non changable )--}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@yourtwitterhandle">
