{{--
    WHAT IT IS:
    The Empty State component is shown when a list has no items.
    It prevents the user from seeing a "dead" screen and suggests an action.

    HOW IT WORKS:
    - It centers content vertically and horizontally.
    - It provides a large SVG icon placeholder.
    - It uses a Slot for an action button (like "Add New Skill").

    DATA:
    - $title:       (string) The main heading.
    - $description: (string) Subtext explaining what to do.
    - $slot:        (slot)   The primary action button.

    HOW TO CUSTOMIZE:
    - Replace the SVG below with a more specific one for your use case.
    - Change the text colors (`text-gray-900`, `text-gray-500`).
--}}

@props(['title', 'description' => ''])

<div {{ $attributes->merge(['class' => 'text-center py-12 px-4 border-2 border-dashed border-gray-300 rounded-lg']) }}>
    {{-- Icon --}}
    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-3.586a1 1 0 00-.707.293l-1.414 1.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-1.414-1.414A1 1 0 009.586 13H4" />
    </svg>

    {{-- Text --}}
    <h3 class="mt-2 text-sm font-medium text-gray-900">{{ $title }}</h3>
    @if ($description)
        <p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
    @endif

    {{-- Action Button --}}
    @if ($slot->isNotEmpty())
        <div class="mt-6">
            {{ $slot }}
        </div>
    @endif
</div>
