{{--
    ============================================================
    PARTIAL: layouts/navigation.blade.php
    SOURCE : Laravel Breeze (auto-generated)
    FILE   : resources/views/layouts/navigation.blade.php

    WHAT IT IS:
        The top navigation bar rendered inside layouts/app.blade.php
        via @include('layouts.navigation').
        It is NOT a standalone component — it's included as a partial.

    FEATURES:
        - Logo (x-application-logo) linking to dashboard
        - Desktop nav links (x-nav.nav-link) — hidden below sm:
        - User dropdown (x-ui.dropdown) with Profile + Logout — hidden below sm:
        - Hamburger button (Alpine.js toggle) — visible below sm:
        - Responsive mobile menu that slides open/closed

    HOW TO ADD A NEW LINK:
        1. Desktop — add inside the "Navigation Links" div:
           <x-nav.nav-link :href="route('skills.index')" :active="request()->routeIs('skills.*')">
               Skills
           </x-nav.nav-link>

        2. Mobile — add inside the responsive div below "Responsive Navigation Menu":
           <x-nav.responsive-nav-link :href="route('skills.index')" :active="request()->routeIs('skills.*')">
               Skills
           </x-nav.responsive-nav-link>

    ALPINE.JS:
        x-data="{ open: false }" — tracks hamburger open/close state.
        The hamburger SVG swaps between ≡ (closed) and ✕ (open) icons.

    USED BY:
        layouts/app.blade.php  →  @include('layouts.navigation')

    CUSTOM VERSION:
        layouts/cnavigation.blade.php is a copy for the x-layouts.capp layout.
    ============================================================
--}}
<!-- Start: Navigation Bar -->
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Start: Primary Navigation Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Start: Left Navigation (Logo & Desktop Links) -->
            <div class="flex">
                <!-- Start: Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
                <!-- End: Logo -->

                <!-- Start: Desktop Navigation Links (hidden on mobile) -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav.nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav.nav-link>

                    <x-nav.nav-link :href="route('skills.index')" :active="request()->routeIs('skills.*')">
                        {{ __('Skills') }}
                    </x-nav.nav-link>

                    <x-nav.nav-link :href="route('category.index')" :active="request()->routeIs('category.*')">
                        {{ __('Categories') }}
                    </x-nav.nav-link>

                    <x-nav.nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                        {{ __('Task') }}
                    </x-nav.nav-link>
                    <!-- Add more desktop links here -->
                </div>
                <!-- End: Desktop Navigation Links -->
            </div>
            <!-- End: Left Navigation -->

            <!-- Start: Settings Dropdown (hidden on mobile) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-ui.dropdown align="right" width="48">
                    <!-- Start: Dropdown Trigger -->
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <!-- End: Dropdown Trigger -->

                    <!-- Start: Dropdown Content -->
                    <x-slot name="content">
                        <!-- Start: Profile Link -->
                        <x-ui.dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-ui.dropdown-link>
                        <!-- End: Profile Link -->

                        <!-- Start: Logout Form -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-ui.dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-ui.dropdown-link>
                        </form>
                        <!-- End: Logout Form -->
                    </x-slot>
                    <!-- End: Dropdown Content -->
                </x-ui.dropdown>
            </div>
            <!-- End: Settings Dropdown -->

            <!-- Start: Hamburger Button (mobile only) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <!-- Start: Hamburger icon (≡) -->
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <!-- End: Hamburger icon -->

                        <!-- Start: Close icon (✕) -->
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        <!-- End: Close icon -->
                    </svg>
                </button>
            </div>
            <!-- End: Hamburger Button -->
        </div>
    </div>
    <!-- End: Primary Navigation Container -->

    <!-- Start: Responsive Navigation Menu (mobile only, toggled by hamburger) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!-- Start: Mobile Nav Links -->
        <div class="pt-2 pb-3 space-y-1">
            <x-nav.responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav.responsive-nav-link>

            <x-nav.responsive-nav-link :href="route('skills.index')" :active="request()->routeIs('skills.*')">
                {{ __('Skills') }}
            </x-nav.responsive-nav-link>

            <x-nav.responsive-nav-link :href="route('category.index')" :active="request()->routeIs('category.*')">
                {{ __('Categories') }}
            </x-nav.responsive-nav-link>

            <x-nav.responsive-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                {{ __('Task') }}
            </x-nav.responsive-nav-link>
            <!-- Add more mobile links here -->
        </div>
        <!-- End: Mobile Nav Links -->

        <!-- Start: Mobile Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <!-- Start: Mobile User Info -->
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <!-- End: Mobile User Info -->

            <!-- Start: Mobile User Actions -->
            <div class="mt-3 space-y-1">
                <x-nav.responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-nav.responsive-nav-link>

                <!-- Start: Mobile Logout Form -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-nav.responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-nav.responsive-nav-link>
                </form>
                <!-- End: Mobile Logout Form -->
            </div>
            <!-- End: Mobile User Actions -->
        </div>
        <!-- End: Mobile Settings Options -->
    </div>
    <!-- End: Responsive Navigation Menu -->
</nav>
<!-- End: Navigation Bar -->
