{{--
    ============================================================
    LAYOUT: components/layouts/capp.blade.php  →  <x-layouts.capp>
    SOURCE : Custom (hand-crafted, not from Breeze)
    FILE   : resources/views/components/layouts/capp.blade.php

    WHAT IT IS:
        A custom version of the standard app layout (x-layouts.app).
        The "c" prefix stands for "custom" — it's identical in
        structure but uses cnavigation.blade.php as the navbar,
        so you can customise the two independently without
        touching the Breeze-generated originals.

    SLOTS:
        $header  — (optional) White banner below the navbar with your page title.
        $slot    — (required) The main page content.

    HOW TO USE:
        <x-layouts.capp>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    My Page Title
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {{-- page content here --}}
                </div>
            </div>
        </x-layouts.capp>

    ROUTE EXAMPLE (in routes/web.php):
        Route::view('/cdashboard', 'cdashboard')->name('cdashboard');

    INCLUDES:
        @include('layouts.cnavigation')
        → Uses the custom nav bar (layouts/cnavigation.blade.php).

    COMPARED TO x-layouts.app:
        Identical structure — only uses cnavigation instead of navigation.
        Customise cnavigation without affecting the Breeze original.
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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{-- Custom navigation bar — edit layouts/cnavigation.blade.php to add links --}}
            @include('layouts.cnavigation')

            <!-- Page Heading — only rendered if $header slot is provided -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Main page content — goes into $slot -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
