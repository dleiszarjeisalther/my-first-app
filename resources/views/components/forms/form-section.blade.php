{{--
    WHAT IT IS:
    A high-level layout component that divides a form into logical sections.
    It shows a Title/Description on the left and the Inputs on the right.

    HOW IT WORKS:
    - It uses a 1/3 to 2/3 grid layout on larger screens.
    - It stacks vertically on mobile devices.
    - It uses the `<x-ui.card>` internally for the input area.

    DATA:
    - $title:       (string) The section heading.
    - $description: (string) Subtext for the section.
    - $slot:        (slot)   The input fields to display on the right.

    HOW TO CUSTOMIZE:
    - Adjust the grid columns (`md:grid-cols-3`) to change the layout balance.
--}}

@props(['title', 'description' => ''])

<!-- Start: Form Section Grid -->
<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6 mb-8']) }}>
    <!-- Start: Sidebar Title & Description -->
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
            @if ($description)
                <p class="mt-1 text-sm text-gray-600">
                    {{ $description }}
                </p>
            @endif
        </div>
    </div>
    <!-- End: Sidebar Title & Description -->

    <!-- Start: Main Inputs Card -->
    <div class="mt-5 md:mt-0 md:col-span-2">
        <x-ui.card :shadow="true">
            <div class="grid grid-cols-6 gap-6">
                {{ $slot }}
            </div>
        </x-ui.card>
    </div>
    <!-- End: Main Inputs Card -->
</div>
<!-- End: Form Section Grid -->
