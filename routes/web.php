<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BerkasAdminController;



Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('beranda');
    Route::get('/input-berkas', [BerkasController::class, 'index'])->name('input-berkas');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('berkas')->group(function () {
        Route::get('/', [BerkasAdminController::class, 'index'])->name('admin.berkas');
        Route::post('/store', [BerkasAdminController::class, 'store'])->name('admin.berkas.store');
        Route::get('/{berkas}/edit', [BerkasAdminController::class, 'edit'])->name('admin.berkas.edit');
        Route::delete('/{berkas}', [BerkasAdminController::class, 'destroy'])->name('admin.berkas.destroy');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });
});

require __DIR__ . '/auth.php';
