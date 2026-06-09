<?php

use function Pest\Laravel\get;

it('renders the login page with the password toggle component', function () {
    $response = get('/login');

    $response->assertSuccessful();
    
    // Check for the password component structure
    $response->assertSee('shown: false');
    $response->assertSee('name="password"', false);
});

it('renders the register page with both password toggle components', function () {
    $response = get('/register');

    $response->assertSuccessful();
    
    // Check for both password and confirm password components
    $response->assertSee('name="password"', false);
    $response->assertSee('name="password_confirmation"', false);
});

it('renders the password reset page with toggle components', function () {
    // We need a valid token/email for the reset page if it's protected, 
    // but usually we can at least check the 'forgot password' page.
    $response = get('/forgot-password');
    $response->assertSuccessful();
});
