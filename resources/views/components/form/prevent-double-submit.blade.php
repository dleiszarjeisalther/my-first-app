@props([
    'action',
    'method' => 'POST',
    'multiSubmit' => false,
    'confirm' => null,
])

<!-- Start: Prevent Double Submit Form -->
<form
    action="{{ $action }}"
    method="{{ $method }}"
    x-data="{ submitting: false, redirectTo: '' }"
    @submit="submitting = true"
    @if($confirm) onsubmit="return confirm(@js($confirm))" @endif
    {{ $attributes }}
>
    <!-- Start: Multi Submit Redirect Input -->
    @if($multiSubmit)
        <input type="hidden" name="redirect_to" :value="redirectTo">
    @endif
    <!-- End: Multi Submit Redirect Input -->

    {{ $slot }}
</form>
<!-- End: Prevent Double Submit Form -->
