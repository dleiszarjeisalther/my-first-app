{{--
    ============================================================
    VIEW: dashboard.blade.php
    WHAT IT IS:
        The main landing page for AUTHENTICATED users.
        It provides a simple greeting and entry points to app features.

    HOW IT WORKS:
        - Uses the <x-app-layout> component (resources/views/layouts/app.blade.php)
        - Populates the "header" slot with a page title
        - Main content goes inside the default $slot

    HOW TO CUSTOMIZE:
        1. Change Title: Modify the <h2> inside the "header" slot.
        2. Add Content: Insert new <div> or <x-ui.card> components
           inside the main container below line 12.

    USED COMPONENTS:
        - x-layouts.app (Main layout wrapper)
        - x-ui.card-style container (inline Tailwind classes)
    ============================================================
--}}

<!-- Start: App Layout -->
<x-app-layout>
    <!-- Start: Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!-- End: Header Slot -->

    <!-- Start: Main Content Container -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Start: Dashboard Card -->
            <x-ui.card>
                {{ __("You're logged in!") }}
                
                <!-- Start: Action Buttons -->
                <div class="mt-4 space-x-2">
                    <x-buttons.button-link href="{{ route('skills.index') }}">
                        View Skills
                    </x-buttons.button-link>
                    <x-buttons.button-link href="{{ route('category.index') }}">
                        View Categories
                    </x-buttons.button-link>
                </div>
                <!-- End: Action Buttons -->
            </x-ui.card>
            <!-- End: Dashboard Card -->
        </div>
    </div>
    <!-- End: Main Content Container -->
</x-app-layout>
<!-- End: App Layout -->
