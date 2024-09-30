<!DOCTYPE>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased">

<div class="overflow-hidden relative w-[1200px] h-[630px] border-t-[56px] border-secondary">
    <div class="mt-24 ml-16 max-w-[900px]">
        <h1 class="text-7xl font-bold leading-tight line-clamp-3">{{ $title }}</h1>
    </div>
    @if($description)
        <div class="mt-4 ml-16 max-w-[900px]">
            <p class="text-5xl leading-tight line-clamp-2">{{ $description }}</p>
        </div>
    @endif
    <div class="absolute bottom-24 left-12">
        <img class="w-[100px]" src="{{ asset('images/logo.svg') }}" alt="">
    </div>
{{--    Uncomment the following code to add the background logo to the bottom right corner of the image.--}}
{{--    <div class="absolute -bottom-[560px] -right-[200px] opacity-5">--}}
{{--        <img class="w-[1200px]" src="{{ asset('images/logo.svg') }}" alt="">--}}
{{--    </div>--}}
</div>
</body>
</html>
