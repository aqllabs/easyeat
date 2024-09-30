<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-outline btn-sm text-white inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
