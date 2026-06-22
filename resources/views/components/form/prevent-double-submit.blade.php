@props([
    'action',
    'method' => 'POST',
    'multiSubmit' => false,
    'confirm' => null,
])

<form
    action="{{ $action }}"
    method="{{ $method }}"
    x-data="{ submitting: false, redirectTo: '' }"
    @submit="submitting = true"
    @if($confirm) onsubmit="return confirm(@js($confirm))" @endif
    {{ $attributes }}
>
    @if($multiSubmit)
        <input type="hidden" name="redirect_to" :value="redirectTo">
    @endif

    {{ $slot }}
</form>
