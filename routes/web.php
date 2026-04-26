<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController; // Don't forget this at the top of the file!
use App\Models\Skill; // Don't forget this at the top of the file!

Route::get('/', function () {
    return view('welcome');
});

// The list we already made
Route::get('/about', [SkillController::class, 'index']);

// 1. Show the form
Route::get('/skills/create', [SkillController::class, 'create']);

// 2. Handle the "POST" request (sending the data)
Route::post('/skills', [SkillController::class, 'store']);

// Show the edit form for a specific skill ID
Route::get('/skills/{id}/edit', [SkillController::class, 'edit']);

// Process the update (we use PUT or PATCH for updates)
Route::patch('/skills/{id}', [SkillController::class, 'update']);

Route::delete('/skills/{id}', [SkillController::class, 'destroy']);
