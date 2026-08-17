{{--
    ============================================================
    VIEW: skills/edit.blade.php
    WHAT IT IS:
        The form for editing an existing Skill entry.

    DATA:
        $skill         — The specific Skill model being edited.
        $categoriesopt — Collection of categories for the dropdown.

    HOW IT WORKS:
        - Uses @method('PATCH') to spoof a PATCH request.
        - The value attribute uses old('field', $model->field).
          - This shows the database value by default.
          - If validation fails, it shows the user's latest input.

    HOW TO CUSTOMIZE:
        - Ensure any new fields added here are also added to the
          $fillable array in the Skill model.
    ============================================================
--}}

<!-- Start: App Layout -->
<x-app-layout>
    <!-- Start: Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Skill') }}
        </h2>
    </x-slot>
    <!-- End: Header Slot -->

    <!-- Start: Main Container -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Start: Back Link -->
                <div class="mb-6">
                    <a href="{{ route('skills.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-800 transition-colors">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Skills
                    </a>
                </div>
                <!-- End: Back Link -->

            <!-- Start: Edit Skill Card -->
            <x-ui.card>
                <!-- Start: Card Header Slot -->
                <x-slot name="header">
                    Edit Skill
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

                <!-- Start: Edit Skill Form -->
                <x-form.prevent-double-submit :action="route('skills.update', $skill->id)">
                    @csrf
                    @method('PATCH')

                    <!-- Start: Skill Name Field -->
                    <div class="mb-4">
                        <x-forms.input-label for="name" value="Skill Name" />
                        <x-forms.text-input id="name" type="text" name="name" value="{{ old('name', $skill->name) }}" class="w-full mt-1" required />
                    </div>
                    <!-- End: Skill Name Field -->

                    <!-- Start: Skill Mastery Percent Field -->
                    <div class="mb-4">
                        <x-forms.input-label for="percent" value="Mastery (%)" />
                        <x-forms.text-input id="percent" type="number" name="percent" value="{{ old('percent', $skill->percent) }}" class="w-full mt-1" required />
                    </div>
                    <!-- End: Skill Mastery Percent Field -->

                    <!-- Start: Category Select Field -->
                    <div class="mb-4">
                        <!-- Start: Category Label & Create Link -->
                        <div class="flex justify-between items-center mb-2">
                            <x-forms.input-label for="category_id" value="Category" />
                            <x-buttons.button-link href="{{ route('category.create') }}">
                                + Create Category
                            </x-buttons.button-link>
                        </div>
                        <!-- End: Category Label & Create Link -->

                        <!-- Start: Select Input -->
                        <x-forms.select id="category_id" name="category_id" class="w-full mt-1" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categoriesopt as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $skill->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </x-forms.select>
                        <!-- End: Select Input -->
                    </div>
                    <!-- End: Category Select Field -->

                    <!-- Start: Form Actions (Update Button) -->
                    <x-buttons.primary-button type="submit" x-bind:disabled="submitting" x-bind:class="{ 'opacity-50 cursor-not-allowed': submitting }">
                        Update Skill
                    </x-buttons.primary-button>
                    <!-- End: Form Actions -->
                </x-form.prevent-double-submit>
                <!-- End: Edit Skill Form -->
            </x-ui.card>
            <!-- End: Edit Skill Card -->
        </div>
    </div>
    <!-- End: Main Container -->
</x-app-layout>
<!-- End: App Layout -->
