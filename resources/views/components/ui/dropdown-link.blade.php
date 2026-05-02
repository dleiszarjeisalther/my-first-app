{{--
    ============================================================
    COMPONENT: dropdown-link
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/dropdown-link.blade.php

    WHAT IT IS:
        A styled <a> link item designed to sit INSIDE a
        <x-ui.dropdown> content slot. It renders a full-width,
        hoverable menu row.

    HOW TO USE:
        Always place it inside the "content" slot of x-ui.dropdown:

        <x-ui.dropdown>
            <x-slot name="content">
                <x-ui.dropdown-link :href="route('profile.edit')">
                    Profile
                </x-ui.dropdown-link>

                <x-ui.dropdown-link href="/settings">
                    Settings
                </x-ui.dropdown-link>
            </x-slot>
        </x-ui.dropdown>

    TIP:
        To make a POST link (like Logout), wrap it in a form
        and use onclick to submit:

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-ui.dropdown-link href="{{ route('logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();">
                Log Out
            </x-ui.dropdown-link>
        </form>
    ============================================================
--}}
<a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>{{ $slot }}</a>
