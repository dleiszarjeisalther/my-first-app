{{--
    ============================================================
    COMPONENT: secondary-button
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/secondary-button.blade.php

    WHAT IT IS:
        A white/outlined button — used for secondary/cancel
        actions alongside a primary-button.

    SLOTS:
        $slot  — The button label text.

    HOW TO USE:
        [x-buttons.secondary-button>Cancel[/x-buttons.secondary-button>

        Note: default type is "button" (not "submit"), so it
        won't accidentally submit a form.

        [x-buttons.secondary-button @click="open = false">Close[/x-buttons.secondary-button>

    STYLE:
        White background with a gray border. Hover → bg-gray-50.
        Disabled state → 25% opacity.
    ============================================================
--}}
<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
