@props([
    'disabled' => false,
    'content' => null
])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-orange-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!} rows=5>{{ $content }} </textarea>
