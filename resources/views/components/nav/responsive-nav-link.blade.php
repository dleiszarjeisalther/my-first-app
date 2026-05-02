{{--
    ============================================================
    COMPONENT: responsive-nav-link
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/responsive-nav-link.blade.php

    WHAT IT IS:
        The MOBILE version of x-nav.nav-link.
        Full-width block links with a left border indicator —
        used inside the hamburger menu that slides open on small
        screens.

    PROPS:
        $active  — (bool) Whether this link is the current page.
                   When true → indigo left-border + indigo text + indigo bg.
                   When false → transparent border + gray text.

    HOW TO USE:
        Used inside the responsive section of layouts/navigation.blade.php:

        <x-nav.responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            Dashboard
        </x-nav.responsive-nav-link>

        <x-nav.responsive-nav-link :href="route('skills.index')" :active="request()->routeIs('skills.*')">
            Skills
        </x-nav.responsive-nav-link>

    NOTE:
        This is the MOBILE link (only visible on sm: and below).
        For desktop use x-nav.nav-link instead.
    ============================================================
--}}
@props(['active'])

@php
// Choose classes based on whether this is the active route
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 text-start text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
