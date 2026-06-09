{{--
    WHAT IT IS:
    A styled dropdown selection component.
    It provides a consistent look for choosing options from a list.

    HOW IT WORKS:
    - It can either take a manual `<option>` slot OR an `:options` array.
    - If you pass an array, it automatically loops through and creates the options.

    DATA:
    - $options: (array)  Optional key => value array to build the list.
    - $selected: (string) The value that should be selected by default.
    - $slot:     (slot)   Manual options (if you don't use the $options array).

    HOW TO CUSTOMIZE:
    - Add a "Please Select" placeholder by passing an empty option in your array.
--}}

@props(['disabled' => false, 'options' => [], 'selected' => null])

<select
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full']) }}
>
    @if (!empty($options))
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    @else
        {{ $slot }}
    @endif
</select>

