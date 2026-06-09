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
        [x-buttons.danger-button>Delete Account[/x-buttons.danger-button>

        Typically paired with a secondary-button as a cancel:
        [x-buttons.secondary-button>Cancel[/x-buttons.secondary-button>
        [x-buttons.danger-button>Yes, Delete[/x-buttons.danger-button>

    STYLE:
        Red background (bg-red-600), white text.
        Hover → bg-red-500. Active → bg-red-700.
    ============================================================
--}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
