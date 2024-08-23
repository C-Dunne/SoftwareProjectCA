@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-primary'
            : '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
