{{--
    WHAT IT IS:
    The Badge component is a small label used to display metadata or status indicators.
    It is perfect for tags like "Active", "Pending", or Skill levels.

    HOW IT WORKS:
    - It maps a `color` prop to a specific set of Tailwind background and text colors.
    - It uses `$attributes->merge` so you can still add extra classes like `mt-2`.

    DATA:
    - $color: (string) The color theme (gray, red, green, blue, yellow). Default: gray.
    - $slot:  (slot) The text to display inside the badge.

    HOW TO CUSTOMIZE:
    - Add a new entry to the `$colors` array below for custom branding.
    - Change `rounded-full` to `rounded-md` if you prefer square badges.
--}}

@props(['color' => 'gray'])

@php
    $colors = [
        'gray' => 'bg-gray-100 text-gray-800',
        'red' => 'bg-red-100 text-red-800',
        'green' => 'bg-green-100 text-green-800',
        'blue' => 'bg-blue-100 text-blue-800',
        'yellow' => 'bg-yellow-100 text-yellow-800',
    ];

    $colorClass = $colors[$color] ?? $colors['gray'];
@endphp

<!-- Start: Badge -->
<span {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {$colorClass}"]) }}>
    {{ $slot }}
</span>
<!-- End: Badge -->
