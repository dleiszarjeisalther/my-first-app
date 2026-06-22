<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
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
                        <h1 class="text-2xl font-extrabold text-gray-900">Edit Category</h1>
                        <p class="text-sm text-gray-500 mt-1">Make changes to the classification tag name.</p>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-r-lg mb-6 shadow-sm flex items-start">
                            <svg class="w-5 h-5 text-red-500 mr-3 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <span class="font-semibold text-sm block">Please fix the errors:</span>
                                <ul class="list-disc list-inside text-xs mt-1 space-y-0.5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <x-form.prevent-double-submit :action="route('category.update', $category->id)">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Category Name</label>
                            <input type="text" name="name" value="{{ old('name', $category->name) }}" class="w-full border border-gray-200 px-3.5 py-2.5 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition-all text-gray-800" required>
                        </div>
                        
                        <div class="flex items-center gap-3 pt-4 border-t border-gray-100 mt-8">
                            <button type="submit" :disabled="submitting" :class="{ 'opacity-50 cursor-not-allowed': submitting }" class="inline-flex items-center justify-center px-5 py-2.5 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 transition-all shadow-sm">
                                Update Category
                            </button>
                            <a href="{{ route('category.index') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg font-semibold text-xs text-gray-600 uppercase tracking-widest hover:bg-gray-50 active:bg-gray-100 transition-all">
                                Cancel
                            </a>
                        </div>
                    </x-form.prevent-double-submit>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
