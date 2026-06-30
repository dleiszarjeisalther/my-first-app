
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skills') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Hello, {{ $user_name }}!</h1>
                <x-buttons.button-link href="{{ route('skills.create') }}">
                    Add Skill
                </x-buttons.button-link>
            </div>

            @if(session('success'))
                <x-ui.alert type="success" message="{{ session('success') }}" />
            @endif

            <ul class="mt-2 space-y-2">
                @foreach($skills as $skill)
                    <x-ui.card class="flex justify-between items-center mb-2 border-l-4 border-red-500">
                        <div>
                            <span class="font-bold text-gray-800">🚀 {{ $skill->name }}</span>
                            <x-ui.badge color="gray" class="ml-2 uppercase">
                                {{ $skill->category->name }}
                            </x-ui.badge>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="font-bold text-red-500">{{ $skill->percent }}%</span>
                            <a href="{{ route('skills.edit', $skill->id) }}" class="text-indigo-600 hover:text-indigo-900 hover:underline text-sm font-medium">Edit</a>
                            <x-form.prevent-double-submit
                                :action="route('skills.destroy', $skill->id)"
                            >
                                @csrf
                                @method('DELETE')
                                <x-buttons.danger-button type="button" @click="$dispatch('open-modal', 'confirm-delete-skill-{{ $skill->id }}')">
                                    Delete
                                </x-buttons.danger-button>

                                <x-ui.modal name="confirm-delete-skill-{{ $skill->id }}" :show="false" maxWidth="sm">
                                    <div class="p-6">
                                        <h2 class="text-lg font-bold text-gray-900">Are you sure?</h2>
                                        <p class="mt-2 text-sm text-gray-600">
                                            Delete this skill? This action cannot be undone.
                                        </p>
                                        <div class="mt-6 flex justify-end gap-3">
                                            <x-buttons.secondary-button type="button" @click="$dispatch('close-modal', 'confirm-delete-skill-{{ $skill->id }}')">
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
                    </x-ui.card>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
