<!-- Start: Guest Layout -->
<x-guest-layout>
    <!-- Start: Password Reset Form -->
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Start: Password Reset Token (Hidden) -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <!-- End: Password Reset Token -->

        <!-- Start: Email Address Field -->
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- End: Email Address Field -->

        <!-- Start: Password Field -->
        <div class="mt-4">
            <x-forms.input-label for="password" :value="__('Password')" />
            <x-forms.password-input id="password" class="block mt-1 w-full" name="password" required autocomplete="new-password" />
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

        <!-- Start: Form Actions (Reset Button) -->
        <div class="flex items-center justify-end mt-4">
            <x-buttons.primary-button>
                {{ __('Reset Password') }}
            </x-buttons.primary-button>
        </div>
        <!-- End: Form Actions -->
    </form>
    <!-- End: Password Reset Form -->
</x-guest-layout>
<!-- End: Guest Layout -->
