<div class="max-w-7xl mx-auto navbar bg-base-100">
    <div class="sm:navbar-start px-4 sm:px-6 lg:px-8">
        <a href="/" class="flex flex-row items-center justify-center font-bold text-md">
            <img class="ml-2 w-24 h-12 object-fill" src="{{ asset('/images/easyeat2.png') }}" alt="">
        </a>
    </div>
    <div class="navbar-center ">
        <ul class="menu menu-horizontal px-1 sm:flex">
            {{-- <li><a href="#features">{{ __('About Us') }}</a></li> --}}
            <li class="hidden sm:block"><a href="{{ route('places.index') }}">{{ __('Explore') }}</a></li>
            <li class="hidden sm:block"><a href="{{ route('map') }}">{{ __('Map') }}</a></li>
            {{-- <li><a href="{{ route('shop.index') }}">{{ __('Shop') }}</a></li> --}}
            {{-- <li><a href="#pricing">{{ __('Pricing') }}</a></li> --}}
            {{-- <li><a href="#">{{ __('How It Works') }}</a></li> --}}
            <li><a href="{{ route('blog.index') }}">{{ __('Blog') }}</a></li>
            <li><a href="{{ route('about') }}">{{ __('About') }}</a></li>
            {{-- <li><a href="{{ route('coming-soon') }}">{{ __('Coming Soon') }}</a></li> --}}
            {{-- <li><a href="{{ route('changelog') }}">{{ __('Changelog') }}</a></li> --}}
        </ul>
    </div>
    <div class="navbar-end">
    </div>
</div>
