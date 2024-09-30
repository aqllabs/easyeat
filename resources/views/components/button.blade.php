<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-secondary btn-sm text-white inline-flex items-center px-4 py-2 font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
