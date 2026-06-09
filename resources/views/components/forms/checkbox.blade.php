{{--
    WHAT IT IS:
    A styled checkbox input for boolean (Yes/No) options.

    HOW IT WORKS:
    - It uses the Tailwind `@tailwindcss/forms` plugin styles (if installed) or standard border/ring classes.
    - It is designed to be placed next to an `[x-forms.input-label>`.

    DATA:
    - $attributes: (bag) Standard attributes like `name`, `id`, `checked`, `value`.

    HOW TO CUSTOMIZE:
    - Change `text-indigo-600` to your primary brand color.
--}}

@props(['disabled' => false])

<input
    type="checkbox"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500']) }}
>
