{{--
    ============================================================
    COMPONENT: nav-link
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/nav-link.blade.php

    WHAT IT IS:
        A horizontal navigation link for the top navbar (desktop).
        It shows an indigo bottom-border underline when active,
        and is styled for inline/flex nav bars.

    PROPS:
        $active  — (bool) Whether this link is the current page.
                   When true → indigo underline + dark text.
                   When false → transparent border + gray text.

    HOW TO USE:
        Used inside layouts/navigation.blade.php nav bar:

        [x-nav.nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            Dashboard
        [/x-nav.nav-link>

        [x-nav.nav-link :href="route('skills.index')" :active="request()->routeIs('skills.*')">
            Skills
        [/x-nav.nav-link>

    NOTE:
        This is the DESKTOP link (hidden on mobile).
        For mobile use x-nav.responsive-nav-link instead.
    ============================================================
--}}
@props(['active'])

@php
// Choose classes based on whether this is the active route
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
