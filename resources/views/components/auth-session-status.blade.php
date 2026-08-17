{{--
    ============================================================
    COMPONENT: auth-session-status
    SOURCE   : Laravel Breeze (auto-generated)
    FILE     : resources/views/components/auth-session-status.blade.php

    WHAT IT IS:
        Displays a green success/status message — typically used
        on the Login page after a password reset email is sent
        or after the user is redirected back with a session flash.

    PROPS:
        $status  (required) — The message string to display.
                               If null/empty, nothing is rendered.

    HOW TO USE:
        Typically placed at the top of a login/auth form:

        <x-auth-session-status :status="session('status')" />

    REAL EXAMPLE (in auth/login.blade.php):
        session('status') returns "Password reset link sent!"
        → This component renders a green <div> with that message.

    TIP:
        You can pass extra classes via $attributes to override
        or extend the default green styling:

        <x-auth-session-status class="mb-4" :status="session('status')" />
    ============================================================
--}}
@props(['status'])

<!-- Start: Auth Session Status -->
@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif
<!-- End: Auth Session Status -->
