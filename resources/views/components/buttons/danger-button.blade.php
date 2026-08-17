{{--
    ============================================================
    COMPONENT: danger-button
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/danger-button.blade.php

    WHAT IT IS:
        A red/destructive submit button — used for dangerous
        actions like deleting an account or permanent deletions.
        Usually shown inside a confirmation modal.

    SLOTS:
        $slot  — The button label text.

    HOW TO USE:
        <x-buttons.danger-button>Delete Account</x-buttons.danger-button>

        Typically paired with a secondary-button as a cancel:
        <x-buttons.secondary-button>Cancel</x-buttons.secondary-button>
        <x-buttons.danger-button>Yes, Delete</x-buttons.danger-button>

    STYLE:
        Red background (bg-red-600), white text.
        Hover → bg-red-500. Active → bg-red-700.
    ============================================================
--}}
<!-- Start: Danger Button -->
<button {{ $attributes->merge(['type' => 'submit', 'class' => config('ui.buttons.danger')]) }}>
    {{ $slot }}
</button>
<!-- End: Danger Button -->
