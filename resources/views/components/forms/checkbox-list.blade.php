{{--
    WHAT IT IS:
    A component that automatically renders a list of checkboxes from an array.
    This is much faster than writing 10 individual checkboxes manually.

    HOW IT WORKS:
    - It loops through the `:options` array (key => label).
    - It generates a unique ID for each checkbox so the labels are clickable.
    - It supports a `:selected` array to check multiple boxes by default.

    DATA:
    - $options:  (array)  key => label array for the list.
    - $name:     (string) The name of the input (usually ends in `[]`).
    - $selected: (array)  List of values that should be checked.

    HOW TO CUSTOMIZE:
    - Change `space-y-2` to `flex space-x-4` if you want a horizontal list.
--}}

@props(['options' => [], 'selected' => [], 'name' => ''])

<!-- Start: Checkbox List Group -->
<div {{ $attributes->merge(['class' => 'space-y-2']) }}>
    <!-- Start: Checkbox Items Loop -->
    @foreach ($options as $value => $label)
        @php
            $id = $name . '_' . $value;
        @endphp
        <!-- Start: Checkbox Item Row -->
        <div class="flex items-center">
            <x-forms.checkbox
                name="{{ $name }}"
                value="{{ $value }}"
                id="{{ $id }}"
                :checked="in_array($value, (array) $selected)"
            />
            <x-forms.input-label for="{{ $id }}" :value="$label" class="ml-2" />
        </div>
        <!-- End: Checkbox Item Row -->
    @endforeach
    <!-- End: Checkbox Items Loop -->
</div>
<!-- End: Checkbox List Group -->
