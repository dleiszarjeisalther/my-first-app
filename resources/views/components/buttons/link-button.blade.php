{{--
    WHAT IT IS:
    The Link Button is a button that looks exactly like a text hyperlink.
    It is used for secondary actions that shouldn't distract the user (like "Cancel").

    HOW IT WORKS:
    - It removes the background and borders.
    - It uses the Indigo primary color for text.
    - It adds an underline on hover for accessibility.

    DATA:
    - $slot: (slot) The text to display.

    HOW TO CUSTOMIZE:
    - Change `text-indigo-600` to `text-gray-600` for even more subtle actions.
--}}

<button {{ $attributes->merge(['class' => 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-indigo-600 hover:text-indigo-900 hover:underline focus:outline-none transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</button>
