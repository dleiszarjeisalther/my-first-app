{{--
    ============================================================
    COMPONENT: input-label
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/input-label.blade.php

    WHAT IT IS:
        A styled <label> element for form fields.
        Small, medium-weight gray text that sits above an input.

    PROPS:
        $value  — (optional) The label text as a prop.
                  If not given, falls back to $slot content.

    HOW TO USE:
        Prop-based (recommended — matches the `for` attribute):
        [x-forms.input-label for="email" value="Email Address" />

        Slot-based (also works):
        [x-forms.input-label for="email">Email Address[/x-forms.input-label>

    FULL FORM GROUP EXAMPLE:
        <div>
            [x-forms.input-label for="name" value="Full Name" />
            [x-forms.text-input id="name" type="text" name="name" class="mt-1 block w-full" />
            [x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

    TIP:
        The `for` attribute must match the `id` of the input
        it labels — this is important for accessibility.
    ============================================================
--}}
@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
