{{--
    WHAT IT IS:
    The Card component is a flexible container for grouping related information.
    It provides a clean, bordered background with consistent padding.

    HOW IT WORKS:
    - It uses Tailwind utility classes for borders, shadows, and spacing.
    - It uses Laravel Slots to allow different sections (Header, Main, Footer).
    - It accepts a `shadow` prop (boolean) to toggle the card shadow.

    DATA:
    - $shadow: (bool) Whether to show a shadow. Default: true.
    - $header: (slot) Optional content for the top of the card.
    - $slot:   (slot) The main content of the card.
    - $footer: (slot) Optional content for the bottom of the card.

    HOW TO CUSTOMIZE:
    - Change the background color by adding `bg-gray-50` or similar.
    - Adjust padding in the `p-6` classes.
--}}

@props(['shadow' => true])

<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden border border-gray-200 sm:rounded-lg' . ($shadow ? ' shadow-sm' : '')]) }}>
    {{-- Header Section --}}
    @if (isset($header))
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
            <h3 class="text-lg font-semibold text-gray-800">
                {{ $header }}
            </h3>
        </div>
    @endif

    {{-- Body Section --}}
    <div class="p-6 text-gray-900">
        {{ $slot }}
    </div>

    {{-- Footer Section --}}
    @if (isset($footer))
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
            {{ $footer }}
        </div>
    @endif
</div>
