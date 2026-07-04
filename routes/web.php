
<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
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

    return response()->file($path);
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

    return response()->file($path);
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

require __DIR__.'/auth.php';
