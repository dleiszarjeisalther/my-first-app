<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto">
                
                <!-- Back Link -->
                <div class="mb-6">
                    <a href="{{ route('category.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-800 transition-colors">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Categories
                    </a>
                </div>

                <!-- Form Card -->
                <div class="bg-white p-8 rounded-xl border border-gray-100 shadow-sm">
                    <div class="mb-6 border-b border-gray-100 pb-5">
                        <h1 class="text-2xl font-extrabold text-gray-900">Add a New Category</h1>
                        <p class="text-sm text-gray-500 mt-1">Define a classification tag that can be applied to your skills library.</p>
                    </div>

                    @if ($errors->any())
                        <x-ui.alert type="error" message="Please fix the errors below." />
                        <ul class="text-red-500 mb-4 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <x-form.prevent-double-submit :action="route('category.store')" multi-submit>
                        @csrf
                        <div class="mb-6">
                            <x-forms.input-label for="name" value="Category Name" />
                            <x-forms.text-input id="name" type="text" name="name" value="{{ old('name') }}" class="w-full mt-1" placeholder="e.g. Graphic Design" required />
                        </div>
                        
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 pt-4 border-t border-gray-100 mt-8">
                            <div class="flex items-center gap-3 flex-wrap">
                                <x-buttons.primary-button type="submit" @click="redirectTo = 'skills.create'" x-bind:disabled="submitting" x-bind:class="{ 'opacity-50 cursor-not-allowed': submitting }">
                                    Save & Back to Add Skill
                                </x-buttons.primary-button>
                                <x-buttons.secondary-button type="submit" @click="redirectTo = 'category.index'" x-bind:disabled="submitting" x-bind:class="{ 'opacity-50 cursor-not-allowed': submitting }">
                                    Save Category
                                </x-buttons.secondary-button>
                                <x-buttons.button-link href="{{ route('category.index') }}" class="bg-white border border-gray-200 text-gray-600 hover:bg-gray-50">
                                    Cancel
                                </x-buttons.button-link>
                            </div>
                        </div>
                    </x-form.prevent-double-submit>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
