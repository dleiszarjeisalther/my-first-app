{{--
    WHAT IT IS:
    The Search component is a stylized input field with a magnifying glass icon.
    It is designed for filtering lists or searching for specific records.

    HOW IT WORKS:
    - It uses absolute positioning for the icon to keep it inside the input.
    - It uses `$attributes->merge` so you can add `wire:model` or `name` easily.

    DATA:
    - $placeholder: (string) The text to show when empty. Default: "Search...".

    HOW TO CUSTOMIZE:
    - Change the icon color by modifying the `text-gray-400` class on the SVG.
    - Adjust the width by passing `class="w-full"` or `class="max-w-xs"`.
--}}

@props(['placeholder' => 'Search...'])

<div class="relative rounded-md shadow-sm">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>
    <input
        type="search"
        {{ $attributes->merge(['class' => 'block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) }}
        placeholder="{{ $placeholder }}"
    >
</div>
