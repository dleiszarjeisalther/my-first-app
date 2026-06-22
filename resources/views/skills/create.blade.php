
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
            <div class="max-w-md mx-auto bg-white p-8 rounded shadow">
                <h1 class="text-2xl font-bold mb-6">Add a New Skill</h1>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <x-form.prevent-double-submit :action="route('skills.store')">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Skill Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded" placeholder="e.g. Laravel" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Mastery (%)</label>
                        <input type="number" name="percent" value="{{ old('percent') }}" class="w-full border p-2 rounded" placeholder="e.g. 85" required>
                    </div>
                    <div class="mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-gray-700 font-bold">Category</label>
                            <a href="{{ route('category.create') }}" class="inline-flex items-center px-2 py-1 bg-indigo-600 border border-transparent rounded-md font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-indigo-500">
                                + Create Category
                            </a>
                        </div>
                        <select name="category_id" class="w-full border p-2 rounded shadow-sm focus:border-red-500 outline-none" required>
                            <option value="">-- Select Category --</option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" :disabled="submitting" :class="{ 'opacity-50 cursor-not-allowed': submitting }" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-all">
                        Save Skill
                    </button>
                </x-form.prevent-double-submit>
            </div>
        </div>
    </div>
</x-app-layout>
