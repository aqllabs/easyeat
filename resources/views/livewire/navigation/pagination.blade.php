<div class="join">
    @foreach($pages as $page)
        <button wire:click="$emit('setActivePage', {{ $page }})" class="join-item btn {{ $page === $activePage ? 'btn-active' : '' }}">{{ $page }}</button>
    @endforeach
</div>
