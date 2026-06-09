{{--
    WHAT IT IS:
    A styled multi-line text input for longer content.
    It matches the style of the standard `text-input`.

    HOW IT WORKS:
    - It uses the same focus and border styles as the rest of the form kit.
    - It accepts a `rows` prop to control the initial height.

    DATA:
    - $rows: (int) The number of lines to show. Default: 3.
    - $attributes: (bag) Standard input attributes like `name`, `id`, `placeholder`.

    HOW TO CUSTOMIZE:
    - Use `class="resize-none"` to prevent users from dragging the box bigger.
--}}

@props(['disabled' => false, 'rows' => 3])

<textarea
    {{ $disabled ? 'disabled' : '' }}
    rows="{{ $rows }}"
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full']) }}
>{{ $slot }}</textarea>
