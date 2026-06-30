
{{--
    ============================================================
    VIEW: skills/create.blade.php
    WHAT IT IS:
        The form for creating a new Skill entry.

    DATA:
        $categories — Collection of SkillCategory models for the dropdown.

    HOW IT WORKS:
        - Uses a standard POST form targeting route('skills.store').
        - @csrf is REQUIRED for all Laravel POST forms (security).
        - {{ old('field') }} ensures inputs are preserved if validation fails.
        - Displays error messages at the top via @if ($errors->any()).

    HOW TO CUSTOMIZE:
        1. Form Fields: Add new <input> tags corresponding to database
           columns in the Skill model.
        2. Validation: Logic is handled in SkillController@store or a
           FormRequest class.
    ============================================================
--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Skill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-ui.card>
                <x-slot name="header">
                    Add a New Skill
                </x-slot>

                @if ($errors->any())
                    <x-ui.alert type="error" message="Please fix the errors below." />
                    <ul class="text-red-500 mb-4 list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <x-form.prevent-double-submit :action="route('skills.store')">
                    @csrf
                    <div class="mb-4">
                        <x-forms.input-label for="name" value="Skill Name" />
                        <x-forms.text-input id="name" type="text" name="name" value="{{ old('name') }}" class="w-full mt-1" placeholder="e.g. Laravel" required />
                    </div>
                    <div class="mb-4">
                        <x-forms.input-label for="percent" value="Mastery (%)" />
                        <x-forms.text-input id="percent" type="number" name="percent" value="{{ old('percent') }}" class="w-full mt-1" placeholder="e.g. 85" required />
                    </div>
                    <div class="mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <x-forms.input-label for="category_id" value="Category" />
                            <x-buttons.button-link href="{{ route('category.create') }}">
                                + Create Category
                            </x-buttons.button-link>
                        </div>
                        <x-forms.select id="category_id" name="category_id" class="w-full mt-1" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>
                    <x-buttons.primary-button type="submit" x-bind:disabled="submitting" x-bind:class="{ 'opacity-50 cursor-not-allowed': submitting }">
                        Save Skill
                    </x-buttons.primary-button>
                </x-form.prevent-double-submit>
            </x-ui.card>
        </div>
    </div>
</x-app-layout>
