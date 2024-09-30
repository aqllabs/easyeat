<!-- You can open the modal using window.ID.showModal() method -->
{{--for example if your modal id is "subscribe" then you can open it using window.subscribe.showModal()--}}
{{--<button class="btn" onclick="window.subscribe.showModal()">open modal</button>--}}

<dialog id="{{ $id }}" class="modal" wire:ignore.self>
    <div class="modal-box">
        <form method="dialog">
            <button onclick="window.{{ $id }}.closeModal()" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">{{ $title }}</h3>
        <p class="py-4">{{ $description }}</p>
        <slot/>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
