<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // category
    Route::resource('categories', CategoryController::class)
        ->middleware(IsAdminMiddleware::class);
    // post
    Route::resource('/posts', PostController::class)
        ->middleware(IsAdminMiddleware::class);
    // dashboard
    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});



require __DIR__ . '/auth.php';
