@props(['align' => 'right', 'width' => '48', 'contentClasses' => ''])

@php
    $alignmentClasses = match ($align) {
        'left' => 'start-0',
        'top' => 'top-100 start-50 translate-middle-x',
        default => 'end-0',
    };

    $width = match ($width) {
        '48' => 'dropdown-menu-width',
        default => $width,
    };
@endphp

<div class="position-relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">

    {{-- Dropdown Trigger --}}
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    {{-- Dropdown Content --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="dropdown-menu show position-absolute mt-2 {{ $width }} {{ $alignmentClasses }} shadow"
        style="display: none;"
        @click="open = false"
    >
        <div class="{{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>

</div>