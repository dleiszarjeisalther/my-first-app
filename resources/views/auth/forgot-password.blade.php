<!-- Start: Guest Layout -->
<x-guest-layout>
    <!-- Start: Information Text -->
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>
    <!-- End: Information Text -->

    <!-- Start: Session Status Alert -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- End: Session Status Alert -->

    <!-- Start: Forgot Password Form -->
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Start: Email Address Field -->
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- End: Email Address Field -->

        <!-- Start: Form Actions (Submit Button) -->
        <div class="flex items-center justify-end mt-4">
            <x-buttons.primary-button>
                {{ __('Email Password Reset Link') }}
            </x-buttons.primary-button>
        </div>
        <!-- End: Form Actions -->
    </form>
    <!-- End: Forgot Password Form -->
</x-guest-layout>
<!-- End: Guest Layout -->
