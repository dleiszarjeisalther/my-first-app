{{--
    WHAT IT IS:
    A styled radio input for selecting a single option from a set.

    HOW IT WORKS:
    - It uses the same focus and ring styles as the checkboxes.
    - It is designed to be used inside a loop or a Radio Group.

    DATA:
    - $attributes: (bag) Standard attributes like `name`, `value`, `id`, `checked`.

    HOW TO CUSTOMIZE:
    - Change `text-indigo-600` to match your primary brand color.
--}}

@props(['disabled' => false])

<!-- Start: Radio Input -->
<input
    type="radio"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500']) }}
>
<!-- End: Radio Input -->
