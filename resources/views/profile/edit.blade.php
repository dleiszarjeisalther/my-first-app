{{--
    ============================================================
    VIEW: profile/edit.blade.php
    WHAT IT IS:
        The profile management page where users can update their
        info, change password, or delete their account.

    HOW IT WORKS:
        - Uses <x-app-layout> for the main structure.
        - Splits the page into separate sections via @include.
        - Each section is a "partial" found in profile/partials/.

    DATA FLOW:
        - The ProfileController passes the $user object implicitly.
        - Partial files receive this data and handle their own forms.

    STRUCTURE:
        1. Profile Info Form
        2. Password Update Form
        3. Delete Account Form
    ============================================================
--}}

<!-- Start: App Layout -->
<x-app-layout>
    <!-- Start: Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <!-- End: Header Slot -->

    <!-- Start: Main Container -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Start: Update Profile Information Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <!-- End: Update Profile Information Section -->

            <!-- Start: Update Password Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <!-- End: Update Password Section -->

            <!-- Start: Delete User Account Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            <!-- End: Delete User Account Section -->
        </div>
    </div>
    <!-- End: Main Container -->
</x-app-layout>
<!-- End: App Layout -->
