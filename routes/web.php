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
    Route::get('/input-berkas', [BerkasController::class, 'index'])->name('berkas');
    Route::post('/input-berkas/store', [BerkasController::class, 'store'])->name('berkas.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('berkas')->group(function () {
        Route::get('/', [BerkasAdminController::class, 'index'])->name('admin.berkas');
        Route::post('/store', [BerkasAdminController::class, 'store'])->name('admin.berkas.store');
        Route::put('/{id}/edit', [BerkasAdminController::class, 'edit'])->name('admin.berkas.update');
        Route::delete('/{id}', [BerkasAdminController::class, 'destroy'])->name('admin.berkas.destroy');
        Route::post('/cetak', [BerkasAdminController::class, 'cetak'])->name('admin.berkas.cetak');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::put('/{id}/update', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });
});

require __DIR__ . '/auth.php';
