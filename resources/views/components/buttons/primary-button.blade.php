{{--
    ============================================================
    COMPONENT: primary-button
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/primary-button.blade.php

    WHAT IT IS:
        A dark/black submit button — the main call-to-action
        button style used throughout Breeze forms.

    SLOTS:
        $slot  — The button label text.

    HOW TO USE:
        [x-buttons.primary-button>Save Changes[/x-buttons.primary-button>

        Override type (default is "submit"):
        [x-buttons.primary-button type="button">Click Me[/x-buttons.primary-button>

        Add extra classes via $attributes:
        [x-buttons.primary-button class="w-full">Log In[/x-buttons.primary-button>

    STYLE:
        Dark gray background (bg-gray-800), white text, rounded,
        uppercase small caps. Hover → bg-gray-700.
    ============================================================
--}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => config('ui.buttons.primary')]) }}>
    {{ $slot }}
</button>
