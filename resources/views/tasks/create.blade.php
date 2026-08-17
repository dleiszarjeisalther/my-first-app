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

<!-- Start: App Layout -->
<x-app-layout>
    <!-- Start: Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Task') }}
        </h2>
    </x-slot>
    <!-- End: Header Slot -->

    <!-- Start: Main Container -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Start: Create Skill Card -->
            <x-ui.card>
                <!-- Start: Card Header Slot -->
                <x-slot name="header">
                    Add a New Task
                </x-slot>
                <!-- End: Card Header Slot -->

                <!-- Start: Error Alert Box -->
                @if ($errors->any())
                    <x-ui.alert type="error" message="Please fix the errors below." />
                    <ul class="text-red-500 mb-4 list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <!-- End: Error Alert Box -->

                <!-- Start: Create Skill Form -->
                <x-form.prevent-double-submit :action="route('tasks.store')">
                    @csrf

                    <!-- Start: Skill Name Field -->
                    <div class="mb-4">
                        <x-forms.input-label for="name" value="Task Name" />
                        <x-forms.text-input id="name" type="text" name="name" value="{{ old('name') }}" class="w-full mt-1" placeholder="e.g. Laravel" required />
                    </div>
                    <!-- End: Skill Name Field -->

                    <!-- Start: Form Actions (Save Button) -->
                    <x-buttons.primary-button type="submit" x-bind:disabled="submitting" x-bind:class="{ 'opacity-50 cursor-not-allowed': submitting }">
                        Save Skill
                    </x-buttons.primary-button>
                    <!-- End: Form Actions -->
                </x-form.prevent-double-submit>
                <!-- End: Create Skill Form -->
            </x-ui.card>
            <!-- End: Create Skill Card -->
        </div>
    </div>
    <!-- End: Main Container -->
</x-app-layout>
<!-- End: App Layout -->
