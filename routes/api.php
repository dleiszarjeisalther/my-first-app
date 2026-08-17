<?php

use App\Http\Controllers\Api\SkillApiController;
use Illuminate\Support\Facades\Route;

// Public API endpoints
Route::apiResource('skills', SkillApiController::class);
