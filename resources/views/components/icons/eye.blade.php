{{--
    ICON: Eye (Show / Visible)
    Source: Heroicons — MIT License. Works 100% offline (SVG is embedded here).

    BASIC USAGE:
    <x-icons.eye class="w-5 h-5 text-gray-500" />

    INTEGRATION 1 — Password Toggle (with Alpine.js):
    Use this alongside <x-icons.eye-off /> to show/hide a password field.
    The ready-made component is at: <x-forms.password-input name="password" />

    If you want to build it manually:
    -------------------------------------------------------
    <div x-data="{ shown: false }" class="relative">
        <input :type="shown ? 'text' : 'password'" name="password"
               class="border-gray-300 rounded-md w-full pr-10" />
        <button type="button" @click="shown = !shown"
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
            <x-icons.eye x-show="!shown" class="w-5 h-5" />
            <x-icons.eye-off x-show="shown" class="w-5 h-5" />
        </button>
    </div>
    -------------------------------------------------------

    INTEGRATION 2 — "View" button in a table row:
    <x-buttons.icon-button variant="gray">
        <x-icons.eye class="w-4 h-4" />
    </x-buttons.icon-button>
--}}

<!-- Start: Eye Icon SVG -->
<svg {{ $attributes->merge(['fill' => 'none', 'stroke' => 'currentColor', 'viewBox' => '0 0 24 24']) }}>
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
</svg>
<!-- End: Eye Icon SVG -->
