{{--
    ============================================================
    LAYOUT: layouts/guest.blade.php  →  used as x-layouts.guest
    SOURCE : Laravel Breeze (auto-generated)
    FILE   : resources/views/layouts/guest.blade.php

    WHAT IT IS:
        The layout for GUEST (unauthenticated) pages like:
        Login, Register, Forgot Password, Reset Password.
        Centers content vertically and horizontally.
        Shows the application logo above the white card.

    SLOTS:
        $slot  — (required) The form content (login form, register form, etc.)

    HOW TO USE:
        <x-layouts.guest>
            <!-- Your auth form goes here -->
            <form method="POST" action="{{ route('login') }}">
                ...
            </form>
        </x-layouts.guest>

    USED BY (automatically, by Breeze):
        auth/login.blade.php
        auth/register.blade.php
        auth/forgot-password.blade.php
        auth/reset-password.blade.php
        auth/verify-email.blade.php
        auth/confirm-password.blade.php

    DESIGN:
        - Gray background
        - Centered logo (x-application-logo) linking to /
        - White card below the logo with rounded corners
        - Max width: sm:max-w-md
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
    <body class="font-sans text-gray-900 antialiased">
        <!-- Start: Centered Layout Container -->
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <!-- Start: App Logo Section -->
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            <!-- End: App Logo Section -->

            <!-- Start: Auth Card Container ($slot) -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
            <!-- End: Auth Card Container -->
        </div>
        <!-- End: Centered Layout Container -->
    </body>
    <!-- End: Document Body -->
</html>
<!-- End: HTML Document -->
