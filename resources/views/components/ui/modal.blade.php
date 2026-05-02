{{--
    ============================================================
    COMPONENT: modal
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/modal.blade.php

    WHAT IT IS:
        A full-screen overlay modal dialog powered by Alpine.js.
        Opens/closes via browser events (window.dispatchEvent).
        Handles focus trapping, Escape key, and backdrop click.

    PROPS:
        $name      — (required, string) A unique ID for this modal.
                     Used to target it from open/close events.
        $show      — (bool, default: false) Whether to open on page load.
        $maxWidth  — Size of the dialog box: 'sm' | 'md' | 'lg' | 'xl' | '2xl' (default: '2xl')

    HOW TO OPEN (from anywhere on the page):
        <button @click="$dispatch('open-modal', 'confirm-delete')">
            Delete
        </button>

    HOW TO CLOSE:
        <button @click="$dispatch('close-modal', 'confirm-delete')">
            Cancel
        </button>

    FULL USAGE EXAMPLE:
        {{-- Trigger button --}}
        <x-buttons.primary-button @click="$dispatch('open-modal', 'my-modal')">
            Open Modal
        </x-buttons.primary-button>

        {{-- Modal definition (anywhere in the same page) --}}
        <x-ui.modal name="my-modal" :show="false" max-width="md">
            <div class="p-6">
                <h2 class="text-lg font-bold">Are you sure?</h2>
                <p class="mt-2 text-gray-600">This action cannot be undone.</p>
                <div class="mt-6 flex gap-3">
                    <x-buttons.danger-button>Yes, Delete</x-buttons.danger-button>
                    <x-buttons.secondary-button @click="$dispatch('close-modal', 'my-modal')">
                        Cancel
                    </x-buttons.secondary-button>
                </div>
            </div>
        </x-ui.modal>

    HOW IT WORKS:
        - Listens for `open-modal` and `close-modal` window events
        - Matches events by comparing event.detail to $name
        - Locks body scroll when open (overflow-y-hidden)
        - Clicking the dark backdrop also closes the modal
        - Escape key closes the modal
        - Tab / Shift+Tab are trapped inside the modal for accessibility
    ============================================================
--}}
@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
// Map the maxWidth prop to a Tailwind responsive class
$maxWidth = [
    'sm'  => 'sm:max-w-sm',
    'md'  => 'sm:max-w-md',
    'lg'  => 'sm:max-w-lg',
    'xl'  => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth];
@endphp

<div
    x-data="{
        show: @js($show),
        {{-- Returns all focusable elements inside this modal --}}
        focusables() {
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)]
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable()  { return this.focusables().slice(-1)[0] },
        nextFocusable()  { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable()  { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
    {{-- Watch show state: lock/unlock body scroll --}}
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
    {{-- Listen for open-modal / close-modal events matching $name --}}
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:close.stop="show = false"
    {{-- Keyboard: Escape closes, Tab traps focus inside --}}
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    {{-- x-show handles display automatically; no style attribute needed --}}
>
    {{-- Dark translucent backdrop — clicking it closes the modal --}}
    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        x-on:click="show = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    {{-- Dialog box — slides and scales in/out --}}
    <div
        x-show="show"
        class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        {{ $slot }}
    </div>
</div>
