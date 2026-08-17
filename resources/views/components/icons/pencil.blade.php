{{--
    ICON: Pencil (Edit)
    Source: Heroicons — MIT License. Works 100% offline (SVG is embedded here).

    BASIC USAGE:
    <x-icons.pencil class="w-5 h-5 text-gray-600" />

    INTEGRATION 1 — Edit button inside a table row:
    <x-buttons.icon-button variant="primary" href="{{ route('skills.edit', $skill) }}">
        <x-icons.pencil class="w-4 h-4" />
    </x-buttons.icon-button>

    INTEGRATION 2 — Edit link with text:
    <a href="{{ route('skills.edit', $skill) }}" class="flex items-center text-indigo-600">
        <x-icons.pencil class="w-4 h-4 mr-1" />
        Edit
    </a>
--}}
<!-- Start: Pencil Icon SVG -->
<svg {{ $attributes->merge(['fill' => 'none', 'stroke' => 'currentColor', 'viewBox' => '0 0 24 24']) }}>
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
</svg>
<!-- End: Pencil Icon SVG -->
