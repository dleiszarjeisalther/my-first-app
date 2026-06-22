
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
                <a href="{{ route('skills.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500">
                    Add Skill
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <ul class="mt-2 space-y-2">
                @foreach($skills as $skill)
                    <li class="flex justify-between items-center bg-white p-4 shadow rounded border-l-4 border-red-500">
                        <div>
                            <span class="font-bold text-gray-800">🚀 {{ $skill->name }}</span>
                            <span class="ml-2 text-xs bg-gray-200 text-gray-600 px-2 py-1 rounded-full uppercase">
                                {{ $skill->category->name }}
                            </span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="font-bold text-red-500">{{ $skill->percent }}%</span>
                            <a href="{{ route('skills.edit', $skill->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <x-form.prevent-double-submit
                                :action="route('skills.destroy', $skill->id)"
                                confirm="Delete this skill?"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" :disabled="submitting" :class="{ 'opacity-50 cursor-not-allowed': submitting }" class="text-red-500 hover:underline">Delete</button>
                            </x-form.prevent-double-submit>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
