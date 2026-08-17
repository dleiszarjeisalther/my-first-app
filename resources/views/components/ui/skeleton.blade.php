{{--
    WHAT IT IS:
    The Skeleton component is a placeholder used to represent content that is still loading.
    It helps prevent "layout shift" where elements jump around as they load.

    HOW IT WORKS:
    - It uses the `animate-pulse` Tailwind class to create a rhythmic fading effect.
    - It is essentially a gray div that you can shape using width and height classes.

    DATA:
    - $attributes: (bag) Used to pass `class` for height/width (e.g., `class="h-4 w-1/2"`).

    HOW TO CUSTOMIZE:
    - Add `rounded-full` to make it look like an avatar placeholder.
    - Change `bg-gray-200` to a darker gray for different themes.
--}}

<!-- Start: Skeleton Placeholder -->
<div {{ $attributes->merge(['class' => 'animate-pulse bg-gray-200 rounded']) }}></div>
<!-- End: Skeleton Placeholder -->
