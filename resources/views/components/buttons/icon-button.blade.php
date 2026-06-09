{{--
    WHAT IT IS:
    The Icon Button is a small, round button designed to hold only an icon (SVG).
    It is perfect for row actions in tables (Edit, Delete, View).

    HOW IT WORKS:
    - It uses a circular shape (`rounded-full`).
    - It provides various color variants (primary, danger, gray).
    - It ensures the icon is perfectly centered.

    DATA:
    - $variant: (string) The color theme (primary, danger, gray). Default: gray.
    - $slot:    (slot)   Place your SVG icon here.

    HOW TO CUSTOMIZE:
    - Add `p-2` or `p-3` to change the button size.
--}}

@props(['variant' => 'gray'])

@php
    $variants = [
        'primary' => 'bg-indigo-50 text-indigo-600 hover:bg-indigo-100',
        'danger'  => 'bg-red-50 text-red-600 hover:bg-red-100',
        'gray'    => 'bg-gray-50 text-gray-600 hover:bg-gray-100',
    ];

    $variantClass = $variants[$variant] ?? $variants['gray'];
@endphp

<button {{ $attributes->merge(['class' => "inline-flex items-center p-2 border border-transparent rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150 {$variantClass}"]) }}>
    {{ $slot }}
</button>
