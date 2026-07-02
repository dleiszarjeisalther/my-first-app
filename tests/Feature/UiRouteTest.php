<?php

test('ui base route redirects to index html', function () {
    $this->get('/ui')->assertRedirect('/ui/index.html');
});

test('ui route serves index html file', function () {
    $this->get('/ui/index.html')->assertSuccessful();
});

test('ui route serves css files from ui directory', function () {
    $this->get('/ui/app.css')->assertSuccessful();
});

test('ui route returns not found for non existent files', function () {
    $this->get('/ui/nonexistent-file-12345.html')->assertNotFound();
});

test('ui route prevents path traversal attempts', function () {
    $this->get('/ui/..%2F..%2F.env')->assertNotFound();
});

// Layout & Shell pages
test('ui route serves app html', function () {
    $this->get('/ui/app.html')->assertSuccessful();
});

// Component pages
test('ui route serves ui html', function () {
    $this->get('/ui/ui.html')->assertSuccessful();
});

test('ui route serves buttons html', function () {
    $this->get('/ui/buttons.html')->assertSuccessful();
});

test('ui route serves nav html', function () {
    $this->get('/ui/nav.html')->assertSuccessful();
});

test('ui route serves modals html', function () {
    $this->get('/ui/modals.html')->assertSuccessful();
});

// Forms
test('ui route serves form html', function () {
    $this->get('/ui/form.html')->assertSuccessful();
});

test('ui route serves forms html', function () {
    $this->get('/ui/forms.html')->assertSuccessful();
});

// Authentication pages
test('ui route serves login html', function () {
    $this->get('/ui/login.html')->assertSuccessful();
});

test('ui route serves guest html', function () {
    $this->get('/ui/guest.html')->assertSuccessful();
});

test('ui route serves mfa html file', function () {
    $this->get('/ui/mfa.html')->assertSuccessful();
});

test('ui route serves forgot password html', function () {
    $this->get('/ui/forgot-password.html')->assertSuccessful();
});

test('ui route serves reset password html', function () {
    $this->get('/ui/reset-password.html')->assertSuccessful();
});

// Data display & feedback pages
test('ui route serves tables html', function () {
    $this->get('/ui/tables.html')->assertSuccessful();
});

test('ui route serves states html', function () {
    $this->get('/ui/states.html')->assertSuccessful();
});

test('ui route serves badges html', function () {
    $this->get('/ui/badges.html')->assertSuccessful();
});

// Assets
test('ui route serves icons html', function () {
    $this->get('/ui/icons.html')->assertSuccessful();
});
