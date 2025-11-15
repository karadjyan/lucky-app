<?php

use App\Dashboard\Http\Controllers\DashboardController;
use App\Dashboard\Http\Middleware\TokenMiddleware;
use App\User\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegisterController::class, 'index'])->name('index');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::prefix('link/{token}')->middleware([TokenMiddleware::class])->group(static function() {
    Route::get('/', [DashboardController::class, 'index'])->name('link');
    Route::post('/regenerate', [DashboardController::class, 'regenerate'])->name('link.regenerate');
    Route::post('/deactivate', [DashboardController::class, 'deactivate'])->name('link.deactivate');
});
