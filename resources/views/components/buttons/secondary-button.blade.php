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
<button {{ $attributes->merge(['type' => 'button', 'class' => config('ui.buttons.secondary')]) }}>
    {{ $slot }}
</button>
