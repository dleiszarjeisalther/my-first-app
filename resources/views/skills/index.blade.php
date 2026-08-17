{{--
    ============================================================
    VIEW: skills/index.blade.php
    WHAT IT IS:
        The dashboard/listing page for the "Skills" resource.
        Shows a list of all skills owned by the current user.

    DATA:
        $skills    — Collection of Skill models.
        $user_name — The name of the authenticated user.

    HOW IT WORKS:
        - Loops over $skills using @foreach.
        - Displays progress percentage and category for each.
        - Provides "Edit" (GET) and "Delete" (DELETE) actions.

    HOW TO CUSTOMIZE:
        1. Layout: Modify the <li> container for card styling.
        2. Logic: The delete action uses a standard HTML form
           with @method('DELETE') since browsers only support GET/POST.
    ============================================================
--}}

<!-- Start: App Layout -->
<x-app-layout>
    <!-- Start: Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skills') }}
        </h2>
    </x-slot>
    <!-- End: Header Slot -->

    <!-- Start: Main Container -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Start: Header Section (Greeting & Add Skill Button) -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Hello, {{ $user_name }}!</h1>
                <x-buttons.button-link href="{{ route('skills.create') }}">
                    Add Skill
                </x-buttons.button-link>
            </div>
            <!-- End: Header Section -->

            <!-- Start: Flash Alert Message -->
            @if(session('success'))
                <x-ui.alert type="success" message="{{ session('success') }}" />
            @endif
            <!-- End: Flash Alert Message -->

            <!-- Start: Skills List -->
            <ul class="mt-2 space-y-2">
                <!-- Start: Skill Item Loop -->
                @foreach($skills as $skill)
                    <!-- Start: Skill Card -->
                    <x-ui.card class="flex justify-between items-center mb-2 border-l-4 border-red-500">
                        <!-- Start: Skill Info (Name & Category Badge) -->
                        <div>
                            <span class="font-bold text-gray-800">🚀 {{ $skill->name }}</span>
                            <x-ui.badge color="gray" class="ml-2 uppercase">
                                {{ $skill->category->name }}
                            </x-ui.badge>
                        </div>
                        <!-- End: Skill Info -->

                        <!-- Start: Skill Actions (Percent, Edit & Delete) -->
                        <div class="flex items-center space-x-4">
                            <span class="font-bold text-red-500">{{ $skill->percent }}%</span>
                            <!-- Start: Edit Button -->
                                <x-buttons.button-link href="{{ route('skills.edit', $skill->id) }}" class="bg-gray-50 hover:bg-gray-100 text-gray-600 border border-gray-200">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </x-buttons.button-link>
                                <!-- End: Edit Button -->
                            
                            <!-- Start: Delete Form & Modal -->
                            <x-form.prevent-double-submit
                                :action="route('skills.destroy', $skill->id)"
                            >
                                @csrf
                                @method('DELETE')
                                <x-buttons.danger-button type="button" @click="$dispatch('open-modal', 'confirm-delete-skill-{{ $skill->id }}')">
                                    Delete
                                </x-buttons.danger-button>

                                <!-- Start: Delete Confirmation Modal -->
                                <x-ui.modal name="confirm-delete-skill-{{ $skill->id }}" :show="false" maxWidth="sm">
                                    <div class="p-6">
                                        <h2 class="text-lg font-bold text-gray-900">Are you sure?</h2>
                                        <p class="mt-2 text-sm text-gray-600">
                                            Delete this skill? This action cannot be undone.
                                        </p>
                                        <!-- Start: Modal Buttons -->
                                        <div class="mt-6 flex justify-end gap-3">
                                            <x-buttons.secondary-button type="button" @click="$dispatch('close-modal', 'confirm-delete-skill-{{ $skill->id }}')">
                                                Cancel
                                            </x-buttons.secondary-button>
                                            <x-buttons.danger-button type="submit" x-bind:disabled="submitting" x-bind:class="{ 'opacity-50 cursor-not-allowed': submitting }">
                                                Yes, Delete
                                            </x-buttons.danger-button>
                                        </div>
                                        <!-- End: Modal Buttons -->
                                    </div>
                                </x-ui.modal>
                                <!-- End: Delete Confirmation Modal -->
                            </x-form.prevent-double-submit>
                            <!-- End: Delete Form & Modal -->
                        </div>
                        <!-- End: Skill Actions -->
                    </x-ui.card>
                    <!-- End: Skill Card -->
                @endforeach
                <!-- End: Skill Item Loop -->
            </ul>
            <!-- End: Skills List -->
        </div>
    </div>
    <!-- End: Main Container -->
</x-app-layout>
<!-- End: App Layout -->
