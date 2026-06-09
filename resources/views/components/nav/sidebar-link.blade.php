{{--
    WHAT IT IS:
    A navigation link designed specifically for the sidebar layout.
    It includes space for an icon and a "active" state indicator.

    HOW IT WORKS:
    - It uses a `flex` layout to align the icon and text.
    - It highlights the link with a background color when `active` is true.

    DATA:
    - $active: (bool) Whether this is the current page. Default: false.
    - $icon:   (slot) Place your SVG icon here.
    - $slot:   (slot) The link text.

    HOW TO CUSTOMIZE:
    - Change the `bg-gray-100` to a more vibrant color for the active state.
--}}

@props(['active' => false])

@php
    $classes = ($active ?? false)
                ? 'bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md'
                : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if (isset($icon))
        <div class="{{ ($active ?? false) ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500' }} mr-3 flex-shrink-0 h-6 w-6">
            {{ $icon }}
        </div>
    @endif
    {{ $slot }}
</a>
