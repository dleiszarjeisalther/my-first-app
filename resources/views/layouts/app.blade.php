{{--
    ============================================================
    LAYOUT: layouts/app.blade.php  →  used as x-layouts.app
    SOURCE : Laravel Breeze (auto-generated)
    FILE   : resources/views/layouts/app.blade.php

    WHAT IT IS:
        The main full-page layout for AUTHENTICATED users.
        Includes the top navigation bar and a header slot.
        All protected pages (dashboard, profile, etc.) use this.

    SLOTS:
        $header  — (optional) The page heading bar shown below
                   the navbar. Wrap your <h2> title here.
        $slot    — (required) Main page content.

    HOW TO USE:
        <x-layouts.app>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </h2>
            </x-slot>

            <!-- Your page content goes here -->
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    Hello World
                </div>
            </div>
        </x-layouts.app>

    INCLUDES:
        @include('layouts.navigation')
        → Pulls in the top nav bar with logo, links, and user dropdown.

    RELATED FILES:
        layouts/navigation.blade.php  — the navbar partial
        components/layouts/capp.blade.php — custom c-prefixed version
    ============================================================
--}}
<!-- Start: HTML Document -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- Start: Document Head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Start: Fonts (Figtree from Bunny Fonts) -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- End: Fonts -->

        <!-- Start: Scripts & Styles (Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- End: Scripts & Styles (Vite) -->
    </head>
    <!-- End: Document Head -->

    <!-- Start: Document Body -->
    <body class="font-sans antialiased">
        <!-- Start: Page Background Wrapper -->
        <div class="min-h-screen bg-gray-100">
            <!-- Start: Top Navigation Bar (Logo + Links + User Dropdown) -->
            @include('layouts.navigation')
            <!-- End: Top Navigation Bar -->

            <!-- Start: Page Heading Banner (Rendered only if $header slot provided) -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <!-- End: Page Heading Banner -->

            <!-- Start: Main Page Content Slot -->
            <main>
                {{ $slot }}
            </main>
            <!-- End: Main Page Content Slot -->
        </div>
        <!-- End: Page Background Wrapper -->
    </body>
    <!-- End: Document Body -->
</html>
<!-- End: HTML Document -->
