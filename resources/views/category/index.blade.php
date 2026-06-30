<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-950 tracking-tight">Category Directory</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage categories used to classify your skills.</p>
                </div>
                <x-buttons.button-link href="{{ route('category.create') }}">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Category
                </x-buttons.button-link>
            </div>

            @if(session('success'))
                <x-ui.alert type="success" message="{{ session('success') }}" />
            @endif

            <!-- Categories List -->
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                <ul class="divide-y divide-gray-100">
                    @foreach($categories as $category)
                        <li class="flex justify-between items-center p-5 hover:bg-gray-50/50 transition-colors group">
                            <div class="flex items-center space-x-3.5">
                                <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600 group-hover:scale-105 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <span class="font-semibold text-gray-800 text-base">{{ $category->name }}</span>
                                    <span class="block text-xs text-gray-400 mt-0.5">ID: {{ $category->id }}</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <x-buttons.button-link href="{{ route('category.edit', $category->id) }}" class="bg-gray-50 hover:bg-gray-100 text-gray-600 border border-gray-200">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </x-buttons.button-link>
                                <x-form.prevent-double-submit
                                    :action="route('category.destroy', $category->id)"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <x-buttons.danger-button type="button" @click="$dispatch('open-modal', 'confirm-delete-category-{{ $category->id }}')">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </x-buttons.danger-button>

                                    <x-ui.modal name="confirm-delete-category-{{ $category->id }}" :show="false" maxWidth="sm">
                                        <div class="p-6">
                                            <h2 class="text-lg font-bold text-gray-900">Are you sure?</h2>
                                            <p class="mt-2 text-sm text-gray-600">
                                                Are you sure you want to delete this category? This might affect skills categorized under it.
                                            </p>
                                            <div class="mt-6 flex justify-end gap-3">
                                                <x-buttons.secondary-button type="button" @click="$dispatch('close-modal', 'confirm-delete-category-{{ $category->id }}')">
                                                    Cancel
                                                </x-buttons.secondary-button>
                                                <x-buttons.danger-button type="submit" x-bind:disabled="submitting" x-bind:class="{ 'opacity-50 cursor-not-allowed': submitting }">
                                                    Yes, Delete
                                                </x-buttons.danger-button>
                                            </div>
                                        </div>
                                    </x-ui.modal>
                                </x-form.prevent-double-submit>
                            </div>
                        </li>
                    @endforeach

                    @if($categories->isEmpty())
                        <li class="p-8 text-center">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                            <span class="block text-gray-500 font-medium">No Categories Yet</span>
                            <span class="block text-xs text-gray-400 mt-1">Get started by adding your first skill category.</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
