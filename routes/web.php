<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\trialController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/ui', function () {
    return redirect('/ui/index.html');
});

Route::get('/ui/{file?}', function (?string $file = null) {
    if ($file === null || $file === '') {
        return redirect('/ui/index.html');
    }

    $path = realpath(base_path('ui/'.$file));
    $basePath = realpath(base_path('ui')).DIRECTORY_SEPARATOR;

    if (! $path || ! str_starts_with($path, $basePath) || ! is_file($path)) {
        abort(404);
    }

    $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    $headers = match ($extension) {
        'css' => ['Content-Type' => 'text/css; charset=utf-8'],
        'js' => ['Content-Type' => 'application/javascript; charset=utf-8'],
        'html', 'htm' => ['Content-Type' => 'text/html; charset=utf-8'],
        'svg' => ['Content-Type' => 'image/svg+xml'],
        'png' => ['Content-Type' => 'image/png'],
        'jpg', 'jpeg' => ['Content-Type' => 'image/jpeg'],
        'gif' => ['Content-Type' => 'image/gif'],
        'ico' => ['Content-Type' => 'image/x-icon'],
        'json' => ['Content-Type' => 'application/json; charset=utf-8'],
        default => [],
    };

    return response()->file($path, $headers);
})->where('file', '.*');

Route::get('/uiv2', function () {
    return redirect('/uiv2/index.html');
});

Route::get('/uiv2/{file?}', function (?string $file = null) {
    if ($file === null || $file === '') {
        return redirect('/uiv2/index.html');
    }

    $path = realpath(base_path('uiv2/'.$file));
    $basePath = realpath(base_path('uiv2')).DIRECTORY_SEPARATOR;

    if (! $path || ! str_starts_with($path, $basePath) || ! is_file($path)) {
        abort(404);
    }

    $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    $headers = match ($extension) {
        'css' => ['Content-Type' => 'text/css; charset=utf-8'],
        'js' => ['Content-Type' => 'application/javascript; charset=utf-8'],
        'html', 'htm' => ['Content-Type' => 'text/html; charset=utf-8'],
        'svg' => ['Content-Type' => 'image/svg+xml'],
        'png' => ['Content-Type' => 'image/png'],
        'jpg', 'jpeg' => ['Content-Type' => 'image/jpeg'],
        'gif' => ['Content-Type' => 'image/gif'],
        'ico' => ['Content-Type' => 'image/x-icon'],
        'json' => ['Content-Type' => 'application/json; charset=utf-8'],
        default => [],
    };

    return response()->file($path, $headers);
})->where('file', '.*');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/skills', SkillController::class)->middleware(['auth', 'verified']);
Route::resource('/category', CategoryController::class)->middleware(['auth', 'verified']);

Route::resource('/trial', trialController::class);

require __DIR__.'/auth.php';
