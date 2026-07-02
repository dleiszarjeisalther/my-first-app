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
