<?php

use Illuminate\Support\Facades\Route;
use App\Models\Skill; // Don't forget this at the top of the file!

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('about', [
        'user_name' => 'Dleiszar',
        'skills' => Skill::all() // This pulls EVERY skill from your MySQL table
    ]);
});
