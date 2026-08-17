<!-- Start: App Layout -->
<x-app-layout>
    <!-- Start: Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>
    <!-- End: Header Slot -->

    <!-- Start: Tasks Container -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Start: Header Section (Greeting & Add Skill Button) -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Hello, {{ $user_name }}!</h1>
                <x-buttons.button-link href="{{ route('tasks.create') }}">
                    Add Task
                </x-buttons.button-link>
            </div>
            <!-- End: Header Section -->

            <!-- Start: Task List -->
            <ul class="mt-2 space-y-2">
                <!-- Start: Task Item Loop -->
                @foreach($names as $name)
                    <!-- Start: Task Card -->
                    <x-ui.card class="flex justify-between items-center mb-2 border-l-4 border-red-500">
                        <!-- Start: Task Name -->
                        <div>
                            <span class="font-bold text-gray-800">
                                @if ($name->done)💹@else❌@endif
                                {{ $name->name }}
                            </span>
                        </div>
                        <!-- End: Task Name -->

                        <!-- Start: name Actions (Edit & Delete) -->
                            <div class="flex items-center space-x-2">
                                <!-- Start: Edit Button -->
                                <x-buttons.button-link href="{{ route('tasks.edit', $name->id) }}" class="bg-gray-50 hover:bg-gray-100 text-gray-600 border border-gray-200">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </x-buttons.button-link>
                                <!-- End: Edit Button -->

                                <!-- Start: Delete Form & Modal -->
                                <x-form.prevent-double-submit
                                    :action="route('tasks.destroy', $name->id)"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <!-- Start: Delete Trigger Button -->
                                    <x-buttons.danger-button type="button" @click="$dispatch('open-modal', 'confirm-delete-name-{{ $name->id }}')">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </x-buttons.danger-button>
                                    <!-- End: Delete Trigger Button -->

                                    <!-- Start: Confirmation Modal -->
                                    <x-ui.modal name="confirm-delete-name-{{ $name->id }}" :show="false" maxWidth="sm">
                                        <div class="p-6">
                                            <h2 class="text-lg font-bold text-gray-900">Are you sure?</h2>
                                            <p class="mt-2 text-sm text-gray-600">
                                                Are you sure you want to delete this name? This might affect skills categorized under it.
                                            </p>
                                            <!-- Start: Modal Buttons -->
                                            <div class="mt-6 flex justify-end gap-3">
                                                <x-buttons.secondary-button type="button" @click="$dispatch('close-modal', 'confirm-delete-name-{{ $name->id }}')">
                                                    Cancel
                                                </x-buttons.secondary-button>
                                                <x-buttons.danger-button type="submit" x-bind:disabled="submitting" x-bind:class="{ 'opacity-50 cursor-not-allowed': submitting }">
                                                    Yes, Delete
                                                </x-buttons.danger-button>
                                            </div>
                                            <!-- End: Modal Buttons -->
                                        </div>
                                    </x-ui.modal>
                                    <!-- End: Confirmation Modal -->
                                </x-form.prevent-double-submit>
                                <!-- End: Delete Form & Modal -->
                        </div>
                        <!-- End: name Actions -->
                    </x-ui.card>
                    <!-- End: Task Card -->
                @endforeach
                <!-- End: Task Item Loop -->
            </ul>
            <!-- End: Task List -->
        </div>
    </div>
    <!-- End: Tasks Container -->
</x-app-layout>
<!-- End: App Layout -->