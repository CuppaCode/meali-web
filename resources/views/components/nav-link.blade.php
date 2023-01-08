@props(['active'])

@php
$classes = '';
@endphp

<li class="pb-2">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>