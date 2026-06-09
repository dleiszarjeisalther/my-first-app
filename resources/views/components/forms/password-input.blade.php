@props(['name' => 'password', 'placeholder' => '', 'required' => false])

<div x-data="{ shown: false }" class="relative">
    {{-- The actual input --}}
    <input
        :type="shown ? 'text' : 'password'"
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full pr-10']) }}
    >

    {{-- The Eye Toggle Button --}}
    <button
        type="button"
        @click="shown = !shown"
        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none"
        :title="shown ? 'Hide password' : 'Show password'"
    >
        {{-- Eye Icon: shown when password is HIDDEN (click to reveal) --}}
        <x-icons.eye x-show="!shown" class="w-5 h-5" />

        {{-- Eye-Off Icon: shown when password is VISIBLE (click to hide) --}}
        <x-icons.eye-off x-show="shown" class="w-5 h-5" />
    </button>
</div>
