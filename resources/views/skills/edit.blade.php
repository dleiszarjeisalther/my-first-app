
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Skill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-ui.card>
                <x-slot name="header">
                    Edit Skill
                </x-slot>
                
                @if ($errors->any())
                    <x-ui.alert type="error" message="Please fix the errors below." />
                    <ul class="text-red-500 mb-4 list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <x-form.prevent-double-submit :action="route('skills.update', $skill->id)">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <x-forms.input-label for="name" value="Skill Name" />
                        <x-forms.text-input id="name" type="text" name="name" value="{{ old('name', $skill->name) }}" class="w-full mt-1" required />
                    </div>
                    <div class="mb-4">
                        <x-forms.input-label for="percent" value="Mastery (%)" />
                        <x-forms.text-input id="percent" type="number" name="percent" value="{{ old('percent', $skill->percent) }}" class="w-full mt-1" required />
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
                            @foreach($categoriesopt as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $skill->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>
                    <x-buttons.primary-button type="submit" x-bind:disabled="submitting" x-bind:class="{ 'opacity-50 cursor-not-allowed': submitting }">
                        Update Skill
                    </x-buttons.primary-button>
                </x-form.prevent-double-submit>
            </x-ui.card>
        </div>
    </div>
</x-app-layout>
