
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    
                    <div class="mt-4">
                        <a href="{{ route('skills.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            View Skills
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
