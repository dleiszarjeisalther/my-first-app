<!-- Start: Guest Layout -->
<x-guest-layout>
    <!-- Start: Trial Form -->
    <form action="{{ route('trial.store') }}" method="post">
        @csrf

        <!-- Start: Name Input Field -->
        <div>
            <x-forms.input-label for="name" value="Name:" />
            <x-forms.text-input id="name" type="text" name="name"
                          :value="old('name')" required autofocus />
        </div>
        <!-- End: Name Input Field -->

        <!-- Start: Submit Button -->
        <div class="mt-4">
            <x-buttons.primary-button type="submit">
                Submit
            </x-buttons.primary-button>
        </div>
        <!-- End: Submit Button -->
    </form>
    <!-- End: Trial Form -->
</x-guest-layout>
<!-- End: Guest Layout -->