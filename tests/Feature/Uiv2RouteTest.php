<?php

test('uiv2 base route redirects to index html', function () {
    $this->get('/uiv2')->assertRedirect('/uiv2/index.html');
});

test('uiv2 route serves index html file', function () {
    $this->get('/uiv2/index.html')->assertSuccessful();
});

test('uiv2 route serves css files from uiv2 directory', function () {
    $this->get('/uiv2/app.css')->assertSuccessful();
});

test('uiv2 route returns not found for non existent files', function () {
    $this->get('/uiv2/nonexistent-file-12345.html')->assertNotFound();
});

test('uiv2 route prevents path traversal attempts', function () {
    $this->get('/uiv2/..%2F..%2F.env')->assertNotFound();
});

test('uiv2 dashboard app layout serves successfully with updated header and sidebar elements', function () {
    $response = $this->get('/uiv2/dashboard_app_layout/code.html');

    $response->assertSuccessful();
    expect(file_get_contents(base_path('uiv2/dashboard_app_layout/code.html')))
        ->toContain('Executive User', 'Business Intelligence', 'app-sidebar', 'desktop-sidebar-toggle', '../images/logo-icon.svg');
});
