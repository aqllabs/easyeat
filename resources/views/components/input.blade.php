@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'input input-bordered rounded-md shadow-sm']) !!}>
