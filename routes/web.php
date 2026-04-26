<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', [
        'user_name' => 'Dleiszar',
        'skills' => [
            'Laravel Herd',
            'Laravel 13',
            'Git',
            'MySQL',
            'Tailwind CSS'
        ]
    ]);
});
