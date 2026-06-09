{{--
    WHAT IT IS:
    A component that renders a list of Radio buttons from an array.
    This is the counterpart to `checkbox-list`.

    HOW IT WORKS:
    - It loops through the `:options` array (key => label).
    - It ensures all radios in the group share the same `name` so only one can be picked.
    - It automatically generates unique IDs for accessibility.

    DATA:
    - $options:  (array)  key => label array for the list.
    - $name:     (string) The shared name for the group.
    - $selected: (string) The value that should be picked by default.

    HOW TO CUSTOMIZE:
    - Use `class="flex space-x-4"` to make the list horizontal.
--}}

@props(['options' => [], 'selected' => null, 'name' => ''])

<div {{ $attributes->merge(['class' => 'space-y-2']) }}>
    @foreach ($options as $value => $label)
        @php
            $id = $name . '_' . $value;
        @endphp
        <div class="flex items-center">
            <x-forms.radio
                name="{{ $name }}"
                value="{{ $value }}"
                id="{{ $id }}"
                :checked="$value == $selected"
            />
            <x-forms.input-label for="{{ $id }}" :value="$label" class="ml-2" />
        </div>
    @endforeach
</div>
