<div class="max-w-7xl mx-auto navbar bg-base-100">
    <div class="navbar-start px-4 sm:px-6 lg:px-8">
        <a href="/" class="flex flex-row items-center justify-center font-bold text-md">
            <img class="ml-2 w-24 h-12 object-fill" src="{{ asset('/images/easyeat2.png') }}" alt="">
        </a>
    </div>
    <div class="navbar-center hidden sm:flex justify-center flex-grow">
        <ul class="menu menu-horizontal px-1 flex justify-center">
            <li><a href="{{ route('places.index') }}">{{ __('Explore') }}</a></li>
            <li><a href="{{ route('map') }}">{{ __('Map') }}</a></li>
            <li><a href="{{ route('blog.index') }}">{{ __('Blog') }}</a></li>
            <li><a href="{{ route('about') }}">{{ __('About') }}</a></li>
            <li><a href="{{ route('about') }}#contact">{{ __('Contact Us') }}</a></li>
        </ul>
    </div>
    <div class="navbar-end px-4">
        <flux:dropdown class="sm:hidden">
            <flux:button icon-trailing="bars-3" />

            <flux:menu>
                <flux:menu.item><a href="{{ route('places.index') }}">{{ __('Explore') }}</a></flux:menu.item>
                <flux:menu.item><a href="{{ route('map') }}">{{ __('Map') }}</a></flux:menu.item>
                <flux:menu.item><a href="{{ route('blog.index') }}">{{ __('Blog') }}</a></flux:menu.item>
                <flux:menu.item><a href="{{ route('about') }}">{{ __('About') }}</a></flux:menu.item>
                <flux:menu.item><a href="{{ route('about') }}#contact">{{ __('Contact Us') }}</a></flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </div>
</div>
