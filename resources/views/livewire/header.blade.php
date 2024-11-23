<div class="max-w-7xl m-auto navbar bg-base-100">
    <div class="navbar-start">
        <a href="/" class="flex flex-row items-center justify-center font-bold text-md">
            {{-- <img class="w-16" src="{{ asset('/images/logo.svg') }}" alt=""> --}}
            <span class="ml-2 flex flex-col items-start">
                    <span class="leading-4 text-primary">{{ __('EasyEat') }}</span>
                </span>
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            {{-- <li><a href="#features">{{ __('About Us') }}</a></li> --}}
            <li><a href="{{ route('places.index') }}">{{ __('Explore') }}</a></li>
            <li><a href="{{ route('map') }}">{{ __('Map') }}</a></li>
            {{-- <li><a href="{{ route('shop.index') }}">{{ __('Shop') }}</a></li> --}}
            {{-- <li><a href="#pricing">{{ __('Pricing') }}</a></li> --}}
            {{-- <li><a href="#">{{ __('How It Works') }}</a></li> --}}
            <li><a href="{{ route('blog.index') }}">{{ __('Blog') }}</a></li>
            {{-- <li><a href="{{ route('coming-soon') }}">{{ __('Coming Soon') }}</a></li> --}}
            {{-- <li><a href="{{ route('changelog') }}">{{ __('Changelog') }}</a></li> --}}
        </ul>
    </div>
    <div class="navbar-end">
        {{-- <a href="{{ route('login') }}" class="btn btn-secondary">{{ __('Login') }}</a> --}}
    </div>
</div>
