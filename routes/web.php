<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\trialController;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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
    Route::get('/run-migrations', function () {
        try {
            Artisan::call('migrate', ['--force' => true]);
            $output = Artisan::output();
        } catch (Throwable $e) {
            $output = 'Artisan error: '.$e->getMessage();
        }

        $tasksCreated = false;
        if (! Schema::hasTable('tasks')) {
            try {
                Schema::create('tasks', function (Blueprint $table) {
                    $table->id();
                    $table->string('name');
                    $table->boolean('done')->default(false);
                    $table->unsignedBigInteger('user_id');
                    $table->timestamps();

                    $table->index('user_id');
                });
                $tasksCreated = true;
            } catch (Throwable $e) {
                $output .= ' | Schema error: '.$e->getMessage();
            }
        }

        return response()->json([
            'status' => 'success',
            'tasks_table_created' => $tasksCreated,
            'tasks_table_exists' => Schema::hasTable('tasks'),
            'output' => $output,
        ]);
    })->name('migrations.run');
});

Route::resource('/skills', SkillController::class)->middleware(['auth', 'verified']);
Route::resource('/category', CategoryController::class)->middleware(['auth', 'verified']);
Route::resource('/tasks', TaskController::class)->middleware(['auth', 'verified']);

Route::resource('/trial', trialController::class);

require __DIR__.'/auth.php';
