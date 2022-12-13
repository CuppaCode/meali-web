@props(['active'])

@php
$classes = 'w-16 p-4 border text-gray-700 rounded-2xl mb-4';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
