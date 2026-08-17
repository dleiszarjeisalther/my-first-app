{{--
    ============================================================
    COMPONENT: text-input
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/text-input.blade.php

    WHAT IT IS:
        A styled <input> element for text fields in forms.
        Has a focus ring in indigo and a gray border.

    PROPS:
        $disabled  — (bool, default: false) Disables the input
                     using Blade's @disabled directive.

    HOW TO USE:
        Always pair it with x-forms.input-label (for the label)
        and x-forms.input-error (for validation messages):

        <x-forms.input-label for="email" value="Email" />
        <x-forms.text-input id="email" type="email" name="email"
                      :value="old('email')" required autofocus />
        <x-forms.input-error :messages="$errors->get('email')" />

        Disabled example:
        <x-forms.text-input type="text" :disabled="true" />

    TIP:
        Any extra HTML attributes (id, name, type, value, etc.)
        are automatically forwarded via $attributes->merge().
    ============================================================
--}}
@props(['disabled' => false])

<!-- Start: Text Input -->
<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
<!-- End: Text Input -->
