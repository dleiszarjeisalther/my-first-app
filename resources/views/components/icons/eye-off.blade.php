{{--
    ICON: Eye Off (Hidden / Not Visible)
    Source: Heroicons — MIT License. Works 100% offline (SVG is embedded here).

    BASIC USAGE:
    [x-icons.eye-off class="w-5 h-5 text-gray-500" />

    INTEGRATION — Always pair with [x-icons.eye] for a password toggle:
    -------------------------------------------------------
    <div x-data="{ shown: false }" class="relative">
        <input :type="shown ? 'text' : 'password'" name="password"
               class="border-gray-300 rounded-md w-full pr-10" />
        <button type="button" @click="shown = !shown"
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
            [x-icons.eye]     x-show="!shown" class="w-5 h-5" />  [shown when hidden]
            [x-icons.eye-off] x-show="shown"  class="w-5 h-5" />  [shown when visible]
        </button>
    </div>
    -------------------------------------------------------

    TIP: Use the ready-made [x-forms.password-input name="password" /> instead.
--}}

<svg {{ $attributes->merge(['fill' => 'none', 'stroke' => 'currentColor', 'viewBox' => '0 0 24 24']) }}>
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
</svg>
