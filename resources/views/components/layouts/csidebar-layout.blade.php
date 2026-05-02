{{--
    ============================================================
    LAYOUT: components/layouts/csidebar-layout.blade.php
            →  <x-layouts.csidebar-layout>
    SOURCE : Custom (hand-crafted)
    FILE   : resources/views/components/layouts/csidebar-layout.blade.php

    WHAT IT IS:
        A two-column sidebar layout for admin dashboards or
        any page that needs a fixed left sidebar and scrollable
        main content on the right.

        Left column : Fixed sidebar (logo, nav slot, user footer with logout)
        Right column: Sticky top header + scrollable main content

    SLOTS:
        $sidebar  — (optional) Navigation links inside the sidebar.
                    Use any <a> links, x-nav-link, or custom elements.
        $header   — (optional) Content for the top bar above the main area.
                    Defaults to a generic "Dashboard" heading if omitted.
        $slot     — (required) The main page content area.

    HOW TO USE:
        <x-layouts.csidebar-layout>

            {{-- Sidebar navigation links --}}
            <x-slot name="sidebar">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100">
                    🏠 Dashboard
                </a>
                <a href="{{ route('skills.index') }}"
                   class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100">
                    🛠 Skills
                </a>
            </x-slot>

            {{-- Top header bar --}}
            <x-slot name="header">
                <h1 class="text-lg font-semibold text-gray-800">Skills</h1>
            </x-slot>

            {{-- Main content --}}
            <div class="grid grid-cols-3 gap-4">
                ...
            </div>

        </x-layouts.csidebar-layout>

    SIDEBAR USER FOOTER:
        Automatically shows the logged-in user's initial (avatar),
        name, email, and a logout button at the bottom of the sidebar.
        No extra code needed — Auth::user() is called directly.

    RESPONSIVE:
        The sidebar is hidden on mobile (md:flex).
        You'll need to add a hamburger + drawer if mobile support is needed.
    ============================================================
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts: Figtree from Bunny Fonts (privacy-friendly Google Fonts mirror) -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts: Vite compiles resources/css/app.css + resources/js/app.js -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="flex h-screen overflow-hidden">

            {{-- ── LEFT SIDEBAR ─────────────────────────────────────────── --}}
            {{-- Hidden on mobile (md:flex). Fixed width 256px (w-64). --}}
            <aside class="hidden md:flex md:flex-shrink-0 w-64 flex-col bg-white border-r border-gray-200">

                <!-- Logo — links to dashboard -->
                <div class="flex items-center h-16 px-6 border-b border-gray-200 shrink-0">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <x-application-logo class="h-8 w-auto fill-current text-gray-800" />
                        <span class="font-semibold text-gray-800">{{ config('app.name') }}</span>
                    </a>
                </div>

                <!-- Sidebar Navigation — filled by $sidebar slot -->
                <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                    {{ $sidebar ?? '' }}
                </nav>

                <!-- User Footer — always at the bottom of the sidebar -->
                <div class="border-t border-gray-200 p-4">
                    <div class="flex items-center gap-3">
                        {{-- Avatar: first letter of the user's name --}}
                        <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white text-xs font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-700 truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        {{-- Logout button (icon only) --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-400 hover:text-red-500 transition" title="Log Out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </aside>

            {{-- ── RIGHT: HEADER + MAIN CONTENT ──────────────────────────── --}}
            <div class="flex flex-col flex-1 overflow-y-auto">

                <!-- Top Bar — filled by $header slot, or shows default heading -->
                <header class="bg-white border-b border-gray-200 h-16 flex items-center px-6 shrink-0">
                    @if (isset($header))
                        {{ $header }}
                    @else
                        <h1 class="text-lg font-semibold text-gray-800">Dashboard</h1>
                    @endif
                </header>

                <!-- Page Content — filled by $slot -->
                <main class="flex-1 p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
