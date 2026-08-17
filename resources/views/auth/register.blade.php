<!-- Start: Guest Layout -->
<x-guest-layout>
    <!-- Start: Register Form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Start: Name Field -->
        <div>
            <x-forms.input-label for="name" :value="__('Name')" />
            <x-forms.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- End: Name Field -->

        <!-- Start: Email Address Field -->
        <div class="mt-4">
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- End: Email Address Field -->

        <!-- Start: Password Field -->
        <div class="mt-4">
            <x-forms.input-label for="password" :value="__('Password')" />

            <x-forms.password-input id="password" class="block mt-1 w-full"
                            name="password"
                            required autocomplete="new-password" />

            <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- End: Password Field -->

        <!-- Start: Confirm Password Field -->
        <div class="mt-4">
            <x-forms.input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-forms.password-input id="password_confirmation" class="block mt-1 w-full"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-forms.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!-- End: Confirm Password Field -->

        <!-- Start: Form Actions (Login Link & Register Button) -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-buttons.primary-button class="ms-4">
                {{ __('Register') }}
            </x-buttons.primary-button>
        </div>
        <!-- End: Form Actions -->
    </form>
    <!-- End: Register Form -->
</x-guest-layout>
<!-- End: Guest Layout -->
