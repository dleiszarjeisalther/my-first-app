<!-- Start: Guest Layout -->
<x-guest-layout>
    <!-- Start: Information Text -->
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>
    <!-- End: Information Text -->

    <!-- Start: Confirm Password Form -->
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Start: Password Field -->
        <div>
            <x-forms.input-label for="password" :value="__('Password')" />

            <x-forms.password-input id="password" class="block mt-1 w-full"
                            name="password"
                            required autocomplete="current-password" />

            <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- End: Password Field -->

        <!-- Start: Form Actions (Confirm Button) -->
        <div class="flex justify-end mt-4">
            <x-buttons.primary-button>
                {{ __('Confirm') }}
            </x-buttons.primary-button>
        </div>
        <!-- End: Form Actions -->
    </form>
    <!-- End: Confirm Password Form -->
</x-guest-layout>
<!-- End: Guest Layout -->
