<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'Dleiszar'; // Imagine this came from a database later
    $email = 'example@gmail.com';
    return view('about', [
        'user_name' => $name,
        'user_email' => $email,
    ]);
});
