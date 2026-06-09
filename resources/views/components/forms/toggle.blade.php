{{--
    WHAT IT IS:
    A modern "Switch" or "Toggle" component powered by Alpine.js.
    It is a beautiful alternative to a standard checkbox for settings.

    HOW IT WORKS:
    - It uses a hidden checkbox to store the actual value for the form.
    - Alpine.js handles the visual sliding animation when clicked.
    - It is accessible via keyboard (Space/Enter).

    DATA:
    - $name:    (string) The input name.
    - $label:   (string) The text description next to the toggle.
    - $value:   (bool)   The initial state.

    HOW TO CUSTOMIZE:
    - Change `bg-indigo-600` to change the "On" color.
--}}

@props(['name', 'label' => '', 'value' => false])

<div x-data="{ on: {{ $value ? 'true' : 'false' }} }" class="flex items-center">
    {{-- The actual hidden checkbox for the form --}}
    <input type="checkbox" name="{{ $name }}" class="hidden" :checked="on" value="1">

    {{-- The Toggle Button --}}
    <button
        type="button"
        @click="on = !on"
        :class="on ? 'bg-indigo-600' : 'bg-gray-200'"
        class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2"
        role="switch"
        :aria-checked="on"
    >
        <span
            aria-hidden="true"
            :class="on ? 'translate-x-5' : 'translate-x-0'"
            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
        ></span>
    </button>

    @if ($label)
        <span class="ml-3 text-sm font-medium text-gray-900">{{ $label }}</span>
    @endif
</div>
