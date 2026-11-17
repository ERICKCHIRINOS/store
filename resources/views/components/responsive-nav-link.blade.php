@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'nav-link active fw-medium text-primary'
        : 'nav-link fw-medium text-secondary';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>