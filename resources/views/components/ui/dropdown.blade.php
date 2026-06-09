{{--
    ============================================================
    COMPONENT: dropdown
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/dropdown.blade.php

    WHAT IT IS:
        An Alpine.js-powered dropdown menu wrapper. It renders
        a trigger button and a floating panel that toggles on click.
        Closes automatically when clicking outside.

    PROPS:
        $align          — Panel alignment: 'left' | 'top' | 'right' (default: 'right')
        $width          — Panel width: '48' = w-48 (default: '48')
        $contentClasses — Classes for the inner panel div (default: 'py-1 bg-white')

    SLOTS:
        $trigger  — The clickable element that opens the dropdown (button, avatar, etc.)
        $content  — The dropdown panel contents (use [x-ui.dropdown-link> items here)

    HOW TO USE:
        [x-ui.dropdown align="right" width="48">
            [x-slot name="trigger">
                <button>My Account ▾</button>
            [/x-slot>

            [x-slot name="content">
                [x-ui.dropdown-link :href="route('profile.edit')">Profile[/x-ui.dropdown-link>
                [x-ui.dropdown-link href="/settings">Settings[/x-ui.dropdown-link>
            [/x-slot>
        [/x-ui.dropdown>

    HOW IT WORKS:
        Uses Alpine.js x-data="{ open: false }".
        - Clicking the trigger div toggles `open`
        - Clicking outside fires @click.outside → closes it
        - Dispatching a "close" event also closes it
        - Panel animates in/out with x-transition (scale + opacity)
    ============================================================
--}}
@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
// Convert the align prop into Tailwind positioning classes
$alignmentClasses = match ($align) {
    'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
    'top'  => 'origin-top',
    default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};

// Convert the width prop into a Tailwind w-* class
$width = match ($width) {
    '48'    => 'w-48',
    default => $width,
};
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    {{-- Trigger: clicking this div toggles the dropdown --}}
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    {{-- Panel: shown when open = true, animates in/out --}}
    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
