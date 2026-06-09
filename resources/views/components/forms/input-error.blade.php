{{--
    ============================================================
    COMPONENT: input-error
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/input-error.blade.php

    WHAT IT IS:
        Renders a red list of validation error messages for a
        specific form field. If $messages is empty/null, renders
        nothing at all.

    PROPS:
        $messages  — (required) An array of error strings.
                     Pass $errors->get('fieldName') from the
                     Laravel $errors bag.

    HOW TO USE:
        Place it after the corresponding x-forms.text-input:

        [x-forms.input-label for="email" value="Email" />
        [x-forms.text-input id="email" name="email" type="email" />
        [x-forms.input-error :messages="$errors->get('email')" class="mt-2" />

    HOW IT WORKS:
        Laravel's validation puts errors into the $errors
        MessageBag. $errors->get('email') returns an array
        of error strings for that field.
        This component loops over them and renders a <ul><li>.

    TIP:
        For a field inside a nested array (e.g. name="tags[]"),
        use dot notation: $errors->get('tags.0')
    ============================================================
--}}
@props(['messages'])

@if ($messages)
    {{-- Only renders when there is at least one error message --}}
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
