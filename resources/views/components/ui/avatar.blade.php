{{--
    WHAT IT IS:
    A user profile image component that gracefully handles missing photos.
    It shows a user's initials as a fallback.

    HOW IT WORKS:
    - It attempts to render an `src` image if provided.
    - If no image exists, it calculates and displays the `initials` on a colored background.

    DATA:
    - $src:      (string) The URL of the profile image.
    - $name:     (string) The user's name (used for alt text and initials).
    - $size:     (string) The size variant (sm, md, lg). Default: md.

    HOW TO CUSTOMIZE:
    - Add a new size variant to the `$sizes` array below.
--}}

@props(['src' => null, 'name' => 'User', 'size' => 'md'])

@php
    $sizes = [
        'sm' => 'h-8 w-8 text-xs',
        'md' => 'h-10 w-10 text-sm',
        'lg' => 'h-12 w-12 text-base',
    ];

    $sizeClass = $sizes[$size] ?? $sizes['md'];

    // Get initials from name
    $words = explode(' ', $name);
    $initials = strtoupper(substr($words[0] ?? '', 0, 1) . substr($words[1] ?? '', 0, 1));
@endphp

<!-- Start: Avatar Container -->
<div {{ $attributes->merge(['class' => "relative inline-flex items-center justify-center rounded-full overflow-hidden bg-indigo-100 {$sizeClass}"]) }}>
    <!-- Start: Avatar Image / Initials Fallback -->
    @if ($src)
        <img class="h-full w-full object-cover" src="{{ $src }}" alt="{{ $name }}">
    @else
        <span class="font-medium leading-none text-indigo-700">{{ $initials }}</span>
    @endif
    <!-- End: Avatar Image / Initials Fallback -->
</div>
<!-- End: Avatar Container -->
