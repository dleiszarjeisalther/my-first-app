<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController; // Don't forget this at the top of the file!
use App\Models\Skill; // Don't forget this at the top of the file!

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', [SkillController::class, 'index']);
