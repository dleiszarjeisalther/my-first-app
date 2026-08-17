{{--
    WHAT IT IS:
    A simple hover tooltip powered by Alpine.js.
    It provides extra context or help text for icons and buttons.

    HOW IT WORKS:
    - It uses `x-on:mouseenter` and `x-on:mouseleave` to toggle visibility.
    - It uses absolute positioning to float above the target element.

    DATA:
    - $text: (string) The help text to display.
    - $slot: (slot)   The element that triggers the tooltip (e.g. an icon).

    HOW TO CUSTOMIZE:
    - Adjust the `top-[-40px]` class if the tooltip is too close or far away.
--}}

@props(['text'])

<!-- Start: Tooltip Wrapper -->
<div
    x-data="{ show: false }"
    class="relative inline-block"
    @mouseenter="show = true"
    @mouseleave="show = false"
>
    <!-- Start: Tooltip Target Trigger Slot -->
    {{ $slot }}
    <!-- End: Tooltip Target Trigger Slot -->

    <!-- Start: Tooltip Floating Box -->
    <div
        x-show="show"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        class="absolute z-50 w-48 px-3 py-2 text-xs font-medium text-white bg-gray-900 rounded-lg shadow-sm bottom-full left-1/2 transform -translate-x-1/2 -translate-y-2"
    >
        {{ $text }}
        <!-- Start: Tooltip Arrow -->
        <div class="absolute w-2 h-2 bg-gray-900 rotate-45 left-1/2 -bottom-1 transform -translate-x-1/2"></div>
        <!-- End: Tooltip Arrow -->
    </div>
    <!-- End: Tooltip Floating Box -->
</div>
<!-- End: Tooltip Wrapper -->
